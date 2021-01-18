<?php
require_once( "config.php" );
class poll {

    var $db ;
    var $tbl = array();
    var $pollvars = array();
    var $poll_view_html = array();
    var $poll_result_html = array();
    var $options = array();
    var $options_text = array();
    var $poll_question = array(); 
    var $form_forward = '';
    var $template_set = '';
    var $ip = '';

    function poll() {
        global $POLLTBL, $db, $HTTP_SERVER_VARS,$rooturl;
        $this->tbl = $POLLTBL;
        $this->db = $db;
        if (isset($HTTP_SERVER_VARS['HTTP_X_FORWARDED_FOR']) && eregi("^[0-9]{1,3}\\.[0-9]{1,3}\\.[0-9]{1,3}\\.[0-9]{1,3}$",$HTTP_SERVER_VARS['HTTP_X_FORWARDED_FOR'])) {
            $this->ip = $HTTP_SERVER_VARS['HTTP_X_FORWARDED_FOR'];
        } else {
            $this->ip = getenv("REMOTE_ADDR");
        }
        $this->pollvars = $this->db->fetch_array($this->db->query("SELECT * FROM ".$this->tbl['poll_config']));
        $this->pollvars[base_url]=$rooturl;
        $this->pollvars[base_gif]=$rooturl."/images/icon";
        $this->template_set = "default";
        $this->form_forward = basename($HTTP_SERVER_VARS['PHP_SELF']);
        if ($this->pollvars['result_order'] == "asc") {
            $this->pollvars['result_order'] = "ORDER BY votes ASC";
        } elseif ($this->pollvars['result_order'] == "desc") {
            $this->pollvars['result_order'] = "ORDER BY votes DESC";
        } else {
            $this->pollvars['result_order'] = '';
        }
    }

    function set_template_set($template_set='') {
        if (!empty($template_set)) {
            $this->db->fetch_array($this->db->query("SELECT * FROM ".$this->tbl['poll_tplset']." WHERE tplset_name='$template_set'"));
            if ($this->db->record) {
                $this->template_set = $template_set;
            } else {
                $this->template_set = "default";
            }
        } else {
            $this->template_set = "default";
        }
        return $this->template_set;
    }

    function set_display_order($order='') {
        switch ($order) {
            case "asc":
                $this->pollvars['result_order'] = "ORDER BY votes ASC";
                break;
            case "desc":
                $this->pollvars['result_order'] = "ORDER BY votes DESC";
                break;
            default:
                $this->pollvars['result_order'] = "";
                return false;
        }
        return true;
    }

    function set_display_result($result='') {
        switch ($result) {
            case "votes":
                $this->pollvars['type'] = "votes";
                break;
            case "percent":
                $this->pollvars['type'] = "percent";
                break;
            default:
                return false;
        }
        return true;
    }

    function set_max_bar_length($max_bar_length='') {
        if ($max_bar_length && $max_bar_length>0) {
            $this->pollvars['img_length'] = $max_bar_length;
            return true;
        } else {
            return false;
        }
    }

    function set_max_bar_height($max_bar_height='') {
        if ($max_bar_height && $max_bar_height>0) {
            $this->pollvars['img_height'] = $max_bar_height;
            return true;
        } else {
            return false;
        }
    }

    function get_poll_tpl($tpl) {
        $this->db->fetch_array($this->db->query("SELECT x.*, y.* from ".$this->tbl['poll_tplset']." x, ".$this->tbl['poll_tpl']." y where x.tplset_name='$this->template_set' and x.tplset_id=y.tplset_id AND y.title='$tpl'"));
        if ($this->db->record['template']) {
            $this->db->record['template'] = ereg_replace("\"", "\\\"", $this->db->record['template']);
            return $this->db->record['template'];
        } else {
            return false;
        }
    }

    function get_poll_data($poll_id) {
        if (!isset($this->options[$poll_id])) {
            $this->db->query("SELECT SUM(votes) as total FROM ".$this->tbl['poll_data']." WHERE (poll_id = '$poll_id')");
            $this->db->fetch_array($this->db->result);
            $this->options[$poll_id]['total'] = $this->db->record['total'];
            $this->db->query("SELECT * FROM ".$this->tbl['poll_data']." WHERE (poll_id = '$poll_id') ".$this->pollvars['result_order']);
            while ($this->db->fetch_array($this->db->result)) {
                $option_id_arr[] = $this->db->record['option_id'];
                $option_text_arr[] = $this->db->record['option_text'];
                $option_votes_arr[] = $this->db->record['votes'];
                $option_color_arr[] = $this->db->record['color'];
            }
            $this->options[$poll_id]['option_id'] = $option_id_arr;
            $this->options[$poll_id]['option_text'] = $option_text_arr;
            $this->options[$poll_id]['votes'] = $option_votes_arr;
            $this->options[$poll_id]['color'] = $option_color_arr;
            for ($i=0,$maxvote=0; $i<sizeof($option_votes_arr); $i++) {
                $maxvote = ($option_votes_arr[$i]>$maxvote) ? $option_votes_arr[$i] : $maxvote;
            }
            $this->options[$poll_id]['maxvote'] = $maxvote;
        }
        return $this->options[$poll_id];
    }

    function get_poll_option($poll_id) {
        if (!isset($this->options_text[$poll_id])) {
            $query = $this->db->query("SELECT option_id, option_text FROM ".$this->tbl['poll_data']." WHERE (poll_id = '$poll_id') order by option_id asc");
            while ($data = $this->db->fetch_array($query)) {
                $option_id_arr[] = $this->db->record['option_id'];
                $option_text_arr[] = $this->db->record['option_text'];
            }
            $this->options_text[$poll_id]['option_id'] = $option_id_arr;
            $this->options_text[$poll_id]['option_text'] = $option_text_arr;
        }
        return $this->options_text[$poll_id];
    }

    function get_poll_question($poll_id) {
        if (!isset($this->poll_question[$poll_id])) {           
            $row = $this->db->fetch_array($this->db->query("SELECT question FROM ".$this->tbl['poll_index']." WHERE (poll_id = '$poll_id')"));
            $this->poll_question[$poll_id] = htmlspecialchars($row['question']);            
        }
        return $this->poll_question[$poll_id];
    }
    
    function display_poll($poll_id) {
        if (!isset($this->poll_view_html[$poll_id]) || !isset($this->poll_view_html[$poll_id][$this->template_set])) {
            $pollvars = $this->pollvars;
            if (!isset($this->options_text[$poll_id])) {
                $this->get_poll_option($poll_id);
            }
            $question = $this->get_poll_question($poll_id);
            eval("\$display_html = \"".$this->get_poll_tpl("display_head")."\";");
            $loop_html = $this->get_poll_tpl("display_loop");
            for ($i=0;$i<sizeof($this->options_text[$poll_id]['option_id']);$i++) {
                $data['option_text'] = $this->options_text[$poll_id]['option_text'][$i];
                $data['option_id'] = $this->options_text[$poll_id]['option_id'][$i];
                eval("\$display_html .= \"$loop_html\";");
            }
            eval("\$display_html .= \"".$this->get_poll_tpl("display_foot")."\";");
            $this->poll_view_html[$poll_id][$this->template_set] = $display_html;
        }
        return $this->poll_view_html[$poll_id][$this->template_set];
    }

    function view_poll_result($poll_id,$vote_stat=0) {
        if (!isset($this->poll_result_html[$poll_id]) || !isset($this->poll_result_html[$poll_id][$this->template_set])) {
            $pollvars = $this->pollvars;
            $row = $this->db->fetch_array($this->db->query("SELECT * FROM ".$this->tbl['poll_index']." WHERE (poll_id = '$poll_id')"));
            $question = htmlspecialchars($row['question']);
            $VOTE = ($vote_stat==1) ? $this->pollvars['voted'] : '';
            $COMMENT = ($row['comments']==1) ? "<a href=\"javascript:void(window.open('$pollvars[base_url]/comments.php?action=send&amp;id=$poll_id&amp;template_set=$this->template_set','$poll_id','width=230,height=320,toolbar=no,statusbar=no'))\">".$this->pollvars['send_com']."</a>" : '';            
            eval("\$result_html = \"".$this->get_poll_tpl("result_head")."\";");
            $i=0;
            $loop_html = $this->get_poll_tpl("result_loop");
            if (!isset($this->options[$poll_id])) {
                $this->get_poll_data($poll_id);
            }
            $maxvote = ($this->options[$poll_id]['maxvote'] == 0) ? 1 : $this->options[$poll_id]['maxvote'];
            $totalvotes = ($this->options[$poll_id]['total'] == 0) ? 1 : $this->options[$poll_id]['total'];
            for ($i=0;$i<sizeof($this->options[$poll_id]['option_id']);$i++) {
                $img_width = (int) ($this->options[$poll_id]['votes'][$i]*$this->pollvars['img_length']/$maxvote);
                $vote_count = $this->options[$poll_id]['votes'][$i];
                $vote_percent = sprintf("%.2f",($this->options[$poll_id]['votes'][$i]*100/$totalvotes));
                $vote_val = ($this->pollvars['type'] == "percent") ? sprintf("%.1f",($this->options[$poll_id]['votes'][$i]*100/$totalvotes))."%" : $vote_count;
                $option_text = $this->options[$poll_id]['option_text'][$i];
                $option_votes = $this->options[$poll_id]['votes'][$i];
                $poll_color = $this->options[$poll_id]['color'][$i];
                eval("\$result_html .= \"$loop_html\";");
            }
            $total_votes = $this->options[$poll_id]['total'];
            eval("\$result_html .= \"".$this->get_poll_tpl("result_foot")."\";");
            $this->poll_result_html[$poll_id][$this->template_set] = $result_html;
        }
        return $this->poll_result_html[$poll_id][$this->template_set];
    }

    function update_poll($poll_id,$option_id) {
        $this->db->query("UPDATE ".$this->tbl['poll_data']." SET votes=votes+1 WHERE (poll_id='$poll_id') AND (option_id='$option_id')");
        $row = $this->db->fetch_array($this->db->query("SELECT logging as logging FROM ".$this->tbl['poll_index']." WHERE (poll_id = '$poll_id')"));
        $timestamp = time();
        if ($this->pollvars['check_ip'] == 2) {
            $this->db->query("INSERT INTO ".$this->tbl['poll_ip']." (poll_id,ip_addr,timestamp) VALUES ('$poll_id','$this->ip','$timestamp')");
        }
        if ($row['logging'] == 1) {
            $host = @gethostbyaddr($this->ip);
            $agent = getenv("HTTP_USER_AGENT");
            $this->db->query("INSERT INTO ".$this->tbl['poll_log']." (poll_id,option_id,timestamp,ip_addr,host,agent) VALUES ('$poll_id','$option_id','$timestamp','$this->ip','$host','$agent')");
        }
    }

    function is_active_poll_id($poll_id) {
        $this->db->fetch_array($this->db->query("SELECT * FROM ".$this->tbl['poll_index']." WHERE (poll_id='$poll_id' AND status=1)"));
        if (!$this->db->record) {
            return false;
        } elseif ($this->db->record['expire']==0) {
            return true;
        }
        return ($this->db->record['exp_time']<time()) ? false : true;
    }

    function is_valid_poll_id($poll_id) {
        if ($poll_id>0) {
            $this->db->fetch_array($this->db->query("SELECT poll_id FROM ".$this->tbl['poll_index']." WHERE poll_id=$poll_id AND status<'2'"));
            return ($this->db->record['poll_id']) ? true : false;
        } else {
            return false;
        }
    }

    function has_voted($poll_id) {
        global $HTTP_COOKIE_VARS;
        $pollcookie = "AdvancedPoll".$poll_id;
        if (isset($HTTP_COOKIE_VARS[$pollcookie])) {
            return true;
        }
        if ($this->pollvars['check_ip']==2) {
            $today = time()-$this->pollvars['lock_timeout']*3600;
            $this->db->query("DELETE FROM ".$this->tbl['poll_ip']." WHERE (timestamp < $today)");
            $this->db->fetch_array($this->db->query("SELECT * FROM ".$this->tbl['poll_ip']." WHERE (ip_addr = '$this->ip' and poll_id='$poll_id')"));
            return ($this->db->record) ? true : false;
        }
    }

    function get_query_strg($self) {
        global $HTTP_SERVER_VARS;
        if (isset($HTTP_SERVER_VARS['QUERY_STRING']) && !empty($HTTP_SERVER_VARS['QUERY_STRING'])) {
            if (ereg("($self=[0-9]+)",$HTTP_SERVER_VARS['QUERY_STRING'],$regs)) {
                $HTTP_SERVER_VARS['QUERY_STRING'] = str_replace($regs[1], "", $HTTP_SERVER_VARS['QUERY_STRING']);                                
            }
            $HTTP_SERVER_VARS['QUERY_STRING'] = str_replace("$self=", "", $HTTP_SERVER_VARS['QUERY_STRING']);
            if (empty($HTTP_SERVER_VARS['QUERY_STRING'])) {
                $append = $HTTP_SERVER_VARS['PHP_SELF']."?";
            } else {
                $query_vars = explode("&",$HTTP_SERVER_VARS['QUERY_STRING']);
                $append = $HTTP_SERVER_VARS['PHP_SELF']."?";
                for ($i=0; $i<sizeof($query_vars); $i++) {
                    if (!empty($query_vars[$i])) {
                        $append .= $query_vars[$i]."&";        
                    }
                }
            }
        } else {
            $append = $HTTP_SERVER_VARS['PHP_SELF']."?";
        }
        return $append;
    }

    function poll_process($poll_id='') {
        global $HTTP_GET_VARS, $HTTP_POST_VARS;        
        $register_poll_vars = array("poll_ident","option_id","action");
        for ($i=0;$i<sizeof($register_poll_vars);$i++) {
            if (isset($HTTP_POST_VARS[$register_poll_vars[$i]])) {
                eval("\$$register_poll_vars[$i] = \"".trim($HTTP_POST_VARS[$register_poll_vars[$i]])."\";");      
            } elseif (isset($HTTP_GET_VARS[$register_poll_vars[$i]])) {
                eval("\$$register_poll_vars[$i] = \"".trim($HTTP_GET_VARS[$register_poll_vars[$i]])."\";");      
            } else {
                eval("\$$register_poll_vars[$i] = '';");               
            }
        }
        if ($this->is_valid_poll_id($poll_id)) {
            $voted = $this->has_voted($poll_id);
            $is_active = $this->is_active_poll_id($poll_id);
            if ($action=="results" && $poll_id==$poll_ident) {
                return $this->view_poll_result($poll_id,0);
            } elseif (!$is_active) {
                return $this->view_poll_result($poll_id,0);
            } elseif ($is_active && $voted) {
                return $this->view_poll_result($poll_id,1);
            } elseif (!$voted && isset($option_id) && $action=="vote" && $poll_id==$poll_ident) {
                $this->update_poll($poll_id,$option_id);
                return $this->view_poll_result($poll_id,0);
            } else {
                return $this->display_poll($poll_id);
            }
        } else {
            $error = "<b>Poll ID <font color=red>$poll_id</font> does not exist.</b>";
            return $error;
        }
    }

}

?>
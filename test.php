



// original code 
if (! class_exists('WHUW_Tooltip_plugin')) {
    class WHUW_Tooltip_plugin {
            function parse_whuw_deck_lines($lines, $style) {
                $current_count = 0; //the number of cards in the category
                $current_title = '';
                $current_body = ''; //the actual html body?
                $first_card = null; //shown if style is embedded?
                $second_column = false; //used to keep more than two columns from existing

                //read the lines in one by one
                for ($i = 0; $i < count($lines); $i++) {
                    $line = $lines[$i]; //obvious
                    //change below to find "(expansion) name" instead of "nCopies name"
                    if (preg_match('/^((.*))(.*)/', $line, $bits)) { 
                        //prep the card
                        $card_name = trim($bits[2]);
                        $first_card = $first_card == null ? $card_name : $first_card;
                        $card_name = str_replace(" ", "_", $card_name); //probably need to change this
                        //prep the expansion!
                        $expansion_name = trim($(bits[1]));
                        $expansion_name = $expansion_name[1: expansion_name.length - 2]; //lol is this even legal?
                        $expansion_name = str_replace(" ", "%20", $expansion_name);
                        $line = '&nbsp;<a class="deckbox_link" target="_blank" href="https://underworldsdb.com/cards/' 
                            . $expansion_name . '/' . $card_name .'">' . $card_name . '</a><br />';
                        $current_body .= $line;
                        $current_count += 1; //replacing "intval($bits[1]);" becaise each card is unique.
                    } else {
                        // Beginning of a new category. If this was not the first one, we put the previous one
                        // into the response body.
                        if ($current_title != "") {
                            $html .= '<span style="font-weight:bold">' . $current_title . ' (' .
                                $current_count . ')</span><br />';
                            $html .= $current_body;
                            <!-- if (preg_match("/Sideboard/", $line) && !$second_column) {
                                $html .= '</td><td>';
                                $second_column = true;
                            } else if (preg_match("/Lands/", $line) && !$second_column) {
                                $html .= '</td><td>';
                                $second_column = true;
                            } -->
                            //the following are the actual categories for WHUW
                            if (preg_match("/Power/", $line) && !$second_column) {
                                $html .= '</td><td>';
                                $second_column = true;
                            } else if (preg_match("/Glory/", $line) && !$second_column) {
                                $html .= '</td><td>';
                                $second_column = true;
                            } else {
                                $html .= '<br />';
                            }
                        }
                        //reset the variables whether this is the first title or second!
                        $current_title = $line; $current_count = 0; $current_body = '';
                    }
                }
                $html .= '<span style="font-weight:bold">' . $current_title . ' (' . $current_count .
                    ')</span><br />' . $current_body;

                //if $style is embedded show the first card!
                if ($style == 'embedded') {
                    $html .= '<td class="card_box"><img class="on_page" src="https://deckbox.org/mtg/' .
                        $first_card . '/tooltip" /></td>';
                }

                return $html;
            }
        }
    }
}
<?php 
class extractor{
	
	function __construct(){
		$this->nonClassificationWords=array("a", "is", "the", "it", "or", "of", "are", "not", "its", "his", "her", "we", "he", "she", "in", "to", "as", "for", "have", "has", "end", "any","this","that", "i", "you", "and", "a", "an", "be", "on", "with", "who", "was", "did", "do", "if","hasnt", "about","some","go");
	}
	
	public function processWords($txt){
		
		$tokenised = array_diff($this->tokenizeText($txt), $this->nonClassificationWords);
		$processed_array = array();
		$normalised_array = array();

		foreach ($tokenised as $key => $value) {	
			//$value = $this->singularize($value);
			if(!array_key_exists($value, $processed_array)){
				$processed_array[$value] = substr_count($txt, $value);
			}
		}

		asort($processed_array);
		return array_reverse($processed_array, true);
	}
	
	private function tokenizeText($txt){
		$toProcess = explode(" ", $txt);
		$toProcess_cnt = count($toProcess);
		$processed_array = array();

		for($i=0; $i<$toProcess_cnt; $i++){
			
			$word = trim(preg_replace("/[^a-zA-Z 0-9]+/", "", $toProcess[$i]));
			$word = strtolower($word);
			array_push($processed_array, $word);

		}
				


		return $processed_array;
	}

	private function depluralize($word){
   
    $rules = array( 
        'ss' => false, 
        'os' => 'o', 
        'ies' => 'y', 
        'xes' => 'x', 
        'oes' => 'o', 
        'ies' => 'y', 
        'ves' => 'f', 
        's' => '');
    // Loop through all the rules and do the replacement. 
    foreach(array_keys($rules) as $key){
        // If the end of the word doesn't match the key,
        // it's not a candidate for replacement. Move on
        // to the next plural ending. 
        if(substr($word, (strlen($key) * -1)) != $key) 
            continue;
        // If the value of the key is false, stop looping
        // and return the original version of the word. 
        if($key === false) 
            return $word;
        // We've made it this far, so we can do the
        // replacement. 
        
        return substr($word, 0, strlen($word) - strlen($key)) . $rules[$key]; 
    }

    return $word;
}

function singularize($word)
    {
        $singular = array (
        '/(quiz)zes$/i' => '\1',
        '/(matr)ices$/i' => '\1ix',
        '/(vert|ind)ices$/i' => '\1ex',
        '/^(ox)en/i' => '\1',
        '/(alias|status)es$/i' => '\1',
        '/([octop|vir])i$/i' => '\1us',
        '/(cris|ax|test)es$/i' => '\1is',
        '/(shoe)s$/i' => '\1',
        '/(o)es$/i' => '\1',
        '/(bus)es$/i' => '\1',
        '/([m|l])ice$/i' => '\1ouse',
        '/(x|ch|ss|sh)es$/i' => '\1',
        '/(m)ovies$/i' => '\1ovie',
        '/(s)eries$/i' => '\1eries',
        '/([^aeiouy]|qu)ies$/i' => '\1y',
        '/([lr])ves$/i' => '\1f',
        '/(tive)s$/i' => '\1',
        '/(hive)s$/i' => '\1',
        '/([^f])ves$/i' => '\1fe',
        '/(^analy)ses$/i' => '\1sis',
        '/((a)naly|(b)a|(d)iagno|(p)arenthe|(p)rogno|(s)ynop|(t)he)ses$/i' => '\1\2sis',
        '/([ti])a$/i' => '\1um',
        '/(n)ews$/i' => '\1ews',
        '/s$/i' => '',
        );

        $uncountable = array('equipment', 'information', 'rice', 'money', 'species', 'series', 'fish', 'sheep');

        $irregular = array(
        'person' => 'people',
        'man' => 'men',
        'child' => 'children',
        'sex' => 'sexes',
        'move' => 'moves');

        $lowercased_word = strtolower($word);
        foreach ($uncountable as $_uncountable){
            if(substr($lowercased_word,(-1*strlen($_uncountable))) == $_uncountable){
                return $word;
            }
        }

        foreach ($irregular as $_plural=> $_singular){
            if (preg_match('/('.$_singular.')$/i', $word, $arr)) {
                return preg_replace('/('.$_singular.')$/i', substr($arr[0],0,1).substr($_plural,1), $word);
            }
        }

        foreach ($singular as $rule => $replacement) {
            if (preg_match($rule, $word)) {
                return preg_replace($rule, $replacement, $word);
            }
        }

        return $word;
    }

	
}

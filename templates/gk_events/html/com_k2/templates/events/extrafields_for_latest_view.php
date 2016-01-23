<?php

/*
	This is a fix for the lack of extra fields in the K2 latest items view
 */

class GK_K2_ExtraFields_for_LatestView_Fix {
	static function getExtraFields($ids) {
		// if there are latest view items
		if(count($ids)) {
			// get DBO instance
			$db = JFactory::getDBO();
			// prepare queries
			$extra_fields_query = "SELECT id, name, value, type FROM #__k2_extra_fields;";
			$extra_fields_values_query = "SELECT id, extra_fields FROM #__k2_items WHERE id IN(".join(',', $ids).");";
			// get extra fields
			$extra_fields = array();
			$db->setQuery($extra_fields_query);
			$rows = $db->loadAssocList();
			// check if there are some extra fields
			if(count($rows)) {
				foreach($rows as $row) {
					$alias_data = json_decode($row['value']);
					$extra_field = array(
						"name" => $row['name'],
						"alias" => $alias_data[0]->alias,
						"type" => $row['type']
					);
					
					$extra_fields[$row['id']] = $extra_field;
				}
				// get extra fields data
				$extra_fields_data = array();
				$db->setQuery($extra_fields_values_query);
				$items = $db->loadAssocList();
				// check if there are some items with extra fields
				if(count($items)) {
					foreach($items as $item) {
						$extra_fields_results = array();
						$extra_fields_values = json_decode($item['extra_fields']);
						// if there are some extra fields
						if(count($extra_fields_values) > 0) {
							foreach($extra_fields_values as $extra_field) {
								$id = $extra_fields[$extra_field->id]['alias'];
								
								if($extra_fields[$extra_field->id]['type'] == 'link') {
									$extra_fields_results[$id] = '<a href="' . $extra_field->value[1] . '">' . $extra_field->value[0] . '</a>';
								} else {
									$extra_fields_results[$id] = $extra_field->value;
								}
							}
						}
						
						$extra_fields_data[$item['id']] = $extra_fields_results;
					}
				}
				// return effects of the query
				return $extra_fields_data;
			}
		}
		// return empty result
		return array();
	}
}

// EOF
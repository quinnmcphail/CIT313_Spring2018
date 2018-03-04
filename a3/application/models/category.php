<?php
class Category extends Model{

	function getCategory($categoryID){

		$sql =  'SELECT * FROM categories WHERE categoryID = ?';

		// perform query
		$results = $this->db->getrow($sql, array($pID));

		$category = $results;

		return $category;

	}

	public function getAllCategories($limit = 0){

		if($limit > 0){

			$numcategories = ' LIMIT '.$limit;
		}

		$sql =  'SELECT * FROM categories'.$numcategories;

		// perform query
		$results = $this->db->execute($sql);

		while ($row=$results->fetchrow()) {
			$categories[] = $row;
		}

		return $categories;

	}


}
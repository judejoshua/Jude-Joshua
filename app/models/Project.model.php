<?php

class Project extends Db
{
	public function getProjectList()
    {
        try {
            $query = "SELECT `id`, `unique_id`, `project_type`, `project_data`, `project_cover_img`, `project_year`, `project_img_directory` FROM `projects` WHERE `hidden` != '1' ORDER BY STR_TO_DATE(`projects`.`project_year`, '%Y-%m') DESC";
            $stmt = $this->connect()->prepare($query);
            $stmt->execute([]);
            $data = $stmt->fetchAll();
            return $data;
        } catch(PDOException $e){
            return "error=Failed! <br>" . $e->getMessage();
        }
    }
    
    public function getHomeProjectList()
    {
        try {
            $query = "SELECT `unique_id`, `project_type`, `project_data`, `project_cover_img`, `project_year`, `project_img_directory` FROM `projects` WHERE `featured` ='1' ORDER BY STR_TO_DATE(`projects`.`project_year`, '%Y-%m') DESC";
            // $query = "SELECT `unique_id`, `project_type`, `project_data`, `project_cover_img`, `project_year`, `project_img_directory` FROM `projects` WHERE `project_type` LIKE '%UI%' AND `hidden` != '1' ORDER BY RAND() LIMIT 4";
            $stmt = $this->connect()->prepare($query);
            $stmt->execute([]);
            $data = $stmt->fetchAll();
            return $data;
        } catch(PDOException $e){
            return "error=Failed! <br>" . $e->getMessage();
        }
    }

    public function getProjectData($project_unique_id)
    {
        try {
            $query = "SELECT * FROM `projects` WHERE `unique_id` = :project_unique_id";
            $stmt = $this->connect()->prepare($query);
            $stmt->execute([
            	':project_unique_id' => $project_unique_id
            ]);
            $data = $stmt->fetchAll();
            return $data;
        } catch(PDOException $e){
            return "error=Failed! <br>" . $e->getMessage();
        }
    }

}
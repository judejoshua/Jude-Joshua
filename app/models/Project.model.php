<?php

class Project extends Db
{
	public function getProjectList()
    {
        try {
            $query = "SELECT `unique_id`, `project_type`, `project_data`, `project_cover_img`, `project_img_directory` FROM `projects` ORDER BY RAND()";
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
            $query = "SELECT `unique_id`, `project_type`, `project_data`, `project_cover_img`, `project_img_directory` FROM `projects` WHERE `project_type` = 'UI/UX' OR  `project_type` = 'UI/UX, Web design' ORDER BY RAND()";
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
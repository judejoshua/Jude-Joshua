<?php

class Project extends Db
{
	public function getProjectList()
    {
        try {
            $query = "SELECT `unique_id`, `project_data`, `project_type`, `project_cover_img`, `project_img_directory` FROM `projects` ORDER BY  `time_added` DESC";
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

    public function addProjectData($project_unique_id, $project_type, $project_cover_img, $project_img_directory, $project_data, $project_duration)
    {
        try {
            $query = "INSERT INTO `projects`(`unique_id`, `project_type`, `project_cover_img`, `project_img_directory`, `project_data`, `project_duration`) VALUES (:project_unique_id,:project_type,:project_cover_img,:project_img_directory,:project_data,:project_duration)";
            $stmt = $this->connect()->prepare($query);
            $stmt->execute([
            	':project_unique_id' => $project_unique_id,
            	':project_type' => $project_type,
            	':project_cover_img' => $project_cover_img,
            	':project_img_directory' => $project_img_directory,
            	':project_data' => $project_data,
            	':project_duration' => $project_duration
            ]);
            return true;
        } catch(PDOException $e){
            return "error=Failed! <br>" . $e->getMessage();
        }
    }

    public function updateProjectData($project_unique_id, $project_type, $project_cover_img, $project_data, $project_duration)
    {
        try {
            $query = "UPDATE `projects` SET `project_type` = :project_type, 
                                            `project_cover_img` = :project_cover_img,
                                            `project_data`= :project_data, 
                                            `project_duration` = :project_duration
                                        WHERE `unique_id` = :project_unique_id";
            $stmt = $this->connect()->prepare($query);
            $stmt->execute([
                ':project_type' => $project_type,
            	':project_cover_img' => $project_cover_img,
            	':project_data' => $project_data,
            	':project_duration' => $project_duration,
            	':project_unique_id' => $project_unique_id
            ]);
            return true;
        } catch(PDOException $e){
            return "error=Failed! <br>" . $e->getMessage();
        }
    }

    public function deleteProjectData($project_unique_id)
    {
        try {
            $query = "DELETE FROM `projects` WHERE `unique_id` = :project_unique_id";
            $stmt = $this->connect()->prepare($query);
            $stmt->execute([
            	':project_unique_id' => $project_unique_id
            ]);
            return true;
        } catch(PDOException $e){
            return "error=Failed! <br>" . $e->getMessage();
        }
    }

    public function hideProjectData($hide, $project_unique_id)
    {
        try {
            $query = "UPDATE `projects` SET `hidden` = :hide
                                        WHERE `unique_id` = :project_unique_id";
            $stmt = $this->connect()->prepare($query);
            $stmt->execute([
                ':hide' => $hide,
                ':project_unique_id' => $project_unique_id
            ]);
            return true;
        } catch(PDOException $e){
            return "error=Failed! <br>" . $e->getMessage();
        }
    }

    public function showProjectData($hide, $project_unique_id)
    {
        try {
            $query = "UPDATE `projects` SET `hidden` = :hide
                                        WHERE `unique_id` = :project_unique_id";
            $stmt = $this->connect()->prepare($query);
            $stmt->execute([
                ':hide' => $hide,
                ':project_unique_id' => $project_unique_id
            ]);
            return true;
        } catch(PDOException $e){
            return "error=Failed! <br>" . $e->getMessage();
        }
    }

}
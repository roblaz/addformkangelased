<?php

class Model_Main extends Model
{
    public function get_data($admin_mode = false)
    {
        global $db;



        $sql = 'SELECT * FROM `heroes`';
        $rows = $db->getAll($sql);

        


        $data = array(
            'controller' => 'main',
            'action' => 'index'
        );


        $data['head'] = array(
            'Name',
            'City',
            'Desc',
            'Super',
            'Good',
            'Image',

            // '<i class="glyphicon glyphicon-eye-open"></i>',
            // '<i class="glyphicon glyphicon-send"></i>',
            // '<i class="glyphicon glyphicon-edit"></i>',
            '<i class="glyphicon glyphicon-trash"></i>'
        );
        
        foreach ($rows as $row) {

            

            $s = array();
            $s[] = $row['name'];
            $s[] = $row['city'];
            $s[] = $row['description'];
            $s[] = (!empty($row['superhero'])) ? 'Yes' : 'No';
            $s[] = (!empty($row['good'])) ? 'Yes' : 'No';

            if(!empty($row['image'])){
                $s[] = '<img width="300" height="300" src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/>';
            } else {
                $s[] = 'None';
            }
            // $s[] = $CFG['invest_portfolio'][$row['contract_type']];
            // //$s[] = (!empty($row['is_admin'])) ? 'Да' : 'Нет';
            // $s[] = ($row['enabled'] == 'on') ? 'Да' : 'Нет';


            // $s[] = '<a href="main/admin_view?id=' . $row['id'] . '"><i class="glyphicon glyphicon-eye-open"></i></a>';

            // $s[] = '<a href="chat/admin?id=' . $row['id'] . '"><i class="glyphicon glyphicon-send"></i> ' . $unread_msg . '</a>';

            // $s[] = '<a href="admin/edit_user?id=' . $row['id'] . '"><i class="glyphicon glyphicon-edit"></i></a>';
            $s[] = '<a id="rem_lnk" href="main/remove?id=' . $row['hero_id'] . '" target="_blank"><i class="glyphicon glyphicon-trash"></i></a>';

            $data['rows'][] = '<tr><td>' . implode('</td><td>', $s) . '</td></tr>';
        }

        return $data;
    }


    public
    function add()
    {
        global $db;
        $data = array();
        $data['page_title'] = 'New hero';


        if (count($_POST) > 2) {

            $user = $this->get_user_from_POST();
            $data = array_merge($data, $user);

      

            if (!empty($data['messages'])) {
                return $data;
            }


            $sql = 'INSERT INTO `heroes` SET ?u';
            $res = $db->query($sql, $user);

            if (!empty($res)) {

                $location = '/edit?id=' . $db->insertId();

                Route::Location($location);
            }


        }

        return $data;
    }



    private function get_user_from_POST()
    {
        $id = $_REQUEST['id'];
        global $db;
        $default_bid = array(
            'name' => '',
            'city' => '',
            'superhero' => '',
            'description' => '',
            'good' => '',
            'result' => '',



  
        );

        

   

        $allowed = array(
            'name', 'city', 'superhero',
            'description', 'good', 'contract_type',
            'result', 'image'
        );


        $user = $db->filterArray($_POST, $allowed);
        $user = array_merge($default_bid, $user);

        $img = ( file_get_contents($_FILES['image']['tmp_name']) );
        if(!empty($img))
            $user['image'] = $img;

        /// https://www.codexworld.com/store-retrieve-image-from-database-mysql-php/



  



      
        if (empty($user['name'])) {
            $user['messages'][] = 'Name cannot be empty';
            
        }




        return $user;
    }


}

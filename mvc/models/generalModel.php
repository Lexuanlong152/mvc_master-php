<?php
    class generalModel extends DB{
        public $result;
        public $info=array();
        public $course=array();
        public $Onecourse=array();
        public $OneUser=array();
        public $NewComment;
        public $numComments;
        public function getUser($name){
            $sql= "SELECT * FROM users WHERE username = ?;";
            $stmt = mysqli_stmt_init($this->conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                // header("location: ../signUp.php?error=stmtfailed1");
                // exit();
                return false;
            }
            else{
                mysqli_stmt_bind_param($stmt,"s",$name);
                mysqli_stmt_execute($stmt);
                $this->result= mysqli_stmt_get_result($stmt);
                return true;
            }
        }
        public function getEmail($email){
            $sql= "SELECT * FROM users WHERE email = ?;";
            $stmt = mysqli_stmt_init($this->conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
              $error['email']='Kí tự không hợp lệ.';
            }
            mysqli_stmt_bind_param($stmt,"s",$email);
            mysqli_stmt_execute($stmt);
            $this->result= mysqli_stmt_get_result($stmt);
        }
        public function createUser($name,$password,$email){
            $sql= "INSERT INTO users(username,password,email) VALUES (?,?,?);";
            $stmt = mysqli_stmt_init($this->conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){

            }
            else{
                $hashPassword = password_hash($password,PASSWORD_DEFAULT);
                mysqli_stmt_bind_param($stmt,"sss",$name,$hashPassword,$email);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }
        }
        public function setDefaultImg($userID){
            $img="placeholder.png";
            $sql= "INSERT INTO avatar(userID,image) VALUES (?,?);";
            $stmt = mysqli_stmt_init($this->conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){

            }
            else{
                mysqli_stmt_bind_param($stmt,"ss",$userID,$img);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }
        }
        public function updateToken($token,$email){
            $stmt=mysqli_stmt_init($this->conn);
            $sql="UPDATE users SET token=?,tokenExpire=DATE_ADD(NOW(),INTERVAL 5 MINUTE) WHERE email =?";
            if(mysqli_stmt_prepare($stmt,$sql)){
              mysqli_stmt_bind_param( $stmt,"ss",$token,$email);
              mysqli_stmt_execute($stmt);
            }
        }
        public function StillLive($email,$token){
            $sql="SELECT id FROM users WHERE email=? AND token=? AND token<>'' AND tokenExpire>NOW()";
            $stmt=mysqli_stmt_init($this->conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                
            }
            else{
                mysqli_stmt_bind_param( $stmt,"ss",$email,$token);
                mysqli_stmt_execute($stmt);
                $this->result=mysqli_stmt_get_result($stmt);
            }
        }
        public function updatepass($hashPassword,$email){
            $sql="UPDATE users SET token='',password=? WHERE email=?";
            $stmt= mysqli_stmt_init($this->conn);
            if(mysqli_stmt_prepare($stmt,$sql)){
                mysqli_stmt_bind_param( $stmt,"ss",$hashPassword,$email);
                mysqli_stmt_execute($stmt);
            }
        }
        public function getInfo(){
            $sql = "SELECT users.id,users.username,users.email,infouser.fullname,infouser.birthday,infouser.phonenumber,infouser.address,infouser.facebook,infouser.grade,avatar.image FROM infouser INNER JOIN users INNER JOIN avatar ON infouser.userID = users.id AND users.id=avatar.userID ORDER BY users.create_at";
            $res = mysqli_query($this->conn,$sql);
            $this->info= mysqli_fetch_all($res,MYSQLI_ASSOC);
            mysqli_free_result($res);
            mysqli_close($this->conn);
        }
        public function delete($id){
            $idDelete= mysqli_real_escape_string($this->conn,$id); 
            $sql= "DELETE users.*,infouser.* FROM users INNER JOIN infouser ON infouser.userID=users.id WHERE users.id=$idDelete";
            if (mysqli_query($this->conn,$sql)){
                
            }
            else{
                echo 'Connection error: ' . mysqli_connect_error();
            }
        }
        public function update($id,$username,$birthday,$phonenumber,$address){
            $sql1= "UPDATE users SET  username='".$username."' WHERE id = '".$id."'";
            if(mysqli_query($this->conn,$sql1)){
                
            }
            else{
                echo 'query error: ' . mysqli_error($this->conn);
            }
            $sql2= "UPDATE infouser SET birthday='".$birthday."',phonenumber='".$phonenumber."',address='".$address."' WHERE userID='".$id."'";
            mysqli_query($this->conn,$sql2);
        }
        public function add($username,$password,$email,$birthday,$phonenumber,$img){
            $usernameP= mysqli_real_escape_string($this->conn,$username);
            $emailP= mysqli_real_escape_string($this->conn,$email);
            $phonenumberP= mysqli_real_escape_string($this->conn,$phonenumber);
            $birthdayP= mysqli_real_escape_string($this->conn,$birthday);
            $imgP= mysqli_real_escape_string($this->conn,$img);
            $hashPassword= password_hash($password,PASSWORD_DEFAULT);
            $sql1= "INSERT INTO users(username,email,password) VALUES ('$usernameP','$emailP','$hashPassword')";
            if( mysqli_query($this->conn,$sql1) ){
                
            }
            else{
                echo 'query error' . mysqli_connect_error();
            }
            $sql2="SELECT * FROM users WHERE username = '$username'";
            $res=mysqli_query($this->conn,$sql2);
            $data=mysqli_fetch_assoc($res);
            $id=$data['id'];
            $sql3= "INSERT INTO infouser(userID,birthday,phonenumber) VALUES ('$id','$birthdayP','$phonenumberP')";
            mysqli_query($this->conn,$sql3);
            $sql4= "INSERT INTO avatar(userID,image) VALUES ('$id','$imgP')";
            mysqli_query($this->conn,$sql4);
        }

        // PHAT

        public function getContactDB(){
            $sql = "SELECT * FROM contact WHERE id=1";
            $res=mysqli_query($this->conn,$sql);
            $this->result=mysqli_fetch_assoc($res);
        }
        public function updateContactDB($address,$phone,$email){
            $sql = "UPDATE contact SET address=?,email=?,phonenumber=? WHERE id=1";
            $stmt = mysqli_stmt_init($this->conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){

            }
            else{
                mysqli_stmt_bind_param($stmt,"sss",$address,$email,$phone);
                mysqli_stmt_execute($stmt);
            }
        }
        public function renderRow($data){
            $response= '                            
                <div class="comment border-5">              
                            <div class="userName fw-bold fs-5">'.$data['username'].'<span class="time fw-normal text-secondary fs-6"> '.$data['create_at'].'</span></div>
                            <div class="fs-5">'.$data['comment'].'</div>
                            <div class="reply"><small data-commentID="'.$data['id'].'" onclick="reply(this)" class="text-decoration-none text-primary" style="cursor:pointer;">Reply</small> </div>
                    <div class="replies ms-4 p-3">';
            $sql= $this->conn->query(query:"SELECT  reply.id,users.username, reply.comment,DATE_FORMAT(reply.create_at,'%Y-%m-%d') AS create_at FROM reply INNER JOIN users ON reply.userID=users.id WHERE reply.commentID='".$data['id']."' ORDER BY reply.id DESC");
            while ($dataR=$sql->fetch_assoc())
                $response.=$this->renderRow($dataR);
            $response .='        
                    </div>
                </div>'
            ;
            return $response;
        }
        public function addReply($commentID,$cmt,$userID){
            $stmt = mysqli_stmt_init($this->conn);
            $sql="INSERT INTO reply(commentID,comment,userID) VALUES (?,?,?);";
            if(!mysqli_stmt_prepare($stmt,$sql)){
                echo "Error";
            }
            else{
                mysqli_stmt_bind_param( $stmt,"sss",$commentID,$cmt,$userID);
            }
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            $this->NewComment= $this->conn->query(query:"SELECT  reply.id,users.username, reply.comment,DATE_FORMAT(reply.create_at,'%Y-%m-%d') AS create_at FROM reply INNER JOIN users ON reply.userID=users.id ORDER BY reply.id DESC LIMIT 1");
        }
        public function addCmt($userID,$cmt){
            $stmt = mysqli_stmt_init($this->conn);
            $sql= "INSERT INTO comments(userID,comment) VALUES(?,?);";
            if(!mysqli_stmt_prepare($stmt,$sql)){
                echo "Error";
            }
            else{
                mysqli_stmt_bind_param( $stmt,"ss",$userID,$cmt);
            }
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            $this->NewComment= $this->conn->query(query:"SELECT  comments.id,users.username, comment,DATE_FORMAT(comments.create_at,'%Y-%m-%d') AS create_at FROM comments INNER JOIN users ON comments.userID=users.id ORDER BY comments.id DESC LIMIT 1");
        }
        public function getNumComment(){
            $sqlNumComments= $this->conn->query("SELECT id FROM comments");
            $sqlNumReply= $this->conn->query("SELECT * FROM reply");
            $numComments= $sqlNumComments->num_rows + $sqlNumReply->num_rows;
            return $numComments;
        }
        public function renderAll($startP){
            $start = $this->conn->real_escape_string($startP);
            $response="";
            $sql= $this->conn->query(query:"SELECT comments.id,users.username, comment,DATE_FORMAT(comments.create_at,'%Y-%m-%d') AS create_at FROM comments INNER JOIN users ON comments.userID=users.id ORDER BY comments.id DESC LIMIT $start,20 ");
            $data= mysqli_fetch_all($sql,MYSQLI_ASSOC);
            foreach($data as $row){
                $response .= $this->renderRow($row);
            }
            exit($response);
        }
        
        //Phi
        public function getCourse(){
            $sql = "SELECT * FROM course";
            $res=mysqli_query($this->conn,$sql);
            $this->course=mysqli_fetch_all($res,MYSQLI_ASSOC);
        }

        public function deletecourse($id){
            $idDelete= mysqli_real_escape_string($this->conn,$id); 
            $sql= "DELETE FROM course WHERE id=$idDelete";//Chinh dong nay lai de xoa cac cai lien quan toi khoa hoc tron tat ca cac bang
            if (mysqli_query($this->conn,$sql)){
                
            }
            else{
                
            }
        }
        public function updateCourse($name,$target,$author,$price,$category,$content){
            $stmt=mysqli_stmt_init($this->conn);
            $sql="INSERT INTO course(name,img,author,price,category,content) VALUES(?,?,?,?,?,?);";
            if(mysqli_stmt_prepare($stmt,$sql)){
              mysqli_stmt_bind_param( $stmt,"ssssss",$name,$target,$author,$price,$category,$content);
              mysqli_stmt_execute($stmt);
            }
        }
        public function getOneCourse($id){
            $sql = "SELECT * FROM course WHERE id=$id";
            $res=mysqli_query($this->conn,$sql);
            $this->Onecourse=mysqli_fetch_assoc($res);
        }

        public function realUpdateCourse($id,$name,$img,$author,$price,$category,$content){
            $stmt=mysqli_stmt_init($this->conn);
            $sql="UPDATE course SET name=?,img=?,author=?,price=?,category=?,content=? WHERE id=?";
            if(mysqli_stmt_prepare($stmt,$sql)){
              mysqli_stmt_bind_param( $stmt,"sssssss",$name,$img,$author,$price,$category,$content,$id);
              mysqli_stmt_execute($stmt);
            }
        }
        public function getOneUser($id){
            $sql="SELECT users.*,infouser.*,avatar.* FROM users INNER JOIN infouser INNER JOIN avatar WHERE infouser.userID= users.id AND avatar.userID=users.id AND users.id=$id";
            $res=mysqli_query($this->conn,$sql);
            $data=mysqli_fetch_assoc($res);
            $this->OneUser=$data;
        }
        public function realUpdateUser($id,$fullname,$email,$username,$phonenumber,$birthday,$address,$facebook,$grade,$img){
            $stmt=mysqli_stmt_init($this->conn);
            $sql1="UPDATE users SET username=?,email=? WHERE id=?";
            if(mysqli_stmt_prepare($stmt,$sql1)){
              mysqli_stmt_bind_param( $stmt,"sss",$username,$email,$id);
              mysqli_stmt_execute($stmt);
            }
            $sql2="UPDATE infouser SET fullname=?,phonenumber=?,birthday=?,address=?,facebook=?,grade=? WHERE userID=?";
            if(mysqli_stmt_prepare($stmt,$sql2)){
              mysqli_stmt_bind_param( $stmt,"sssssss",$fullname,$phonenumber,$birthday,$address,$facebook,$grade,$id);
              mysqli_stmt_execute($stmt);
            }
            $sql3="UPDATE avatar SET image=? WHERE userID=?";
            if(mysqli_stmt_prepare($stmt,$sql3)){
              mysqli_stmt_bind_param( $stmt,"ss",$img,$id);
              mysqli_stmt_execute($stmt);
            }
        }
    }
?>
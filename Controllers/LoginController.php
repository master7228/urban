<?php 
/**
* 
*/
class LoginController extends Controllers
{
	
	function __construct()
	{
		
		parent::__construct();
			}


	public function index(){
		$this->view->render($this,'index',"");

	}

    public function login(){
        
        if(isset($_POST['user'])){

          $host = "138.197.10.249";
          $port = "5432"; // Puerto predeterminado de PostgreSQL
          $dbname = "cvs_production";
          $user = "comercio";
          $password = "j0rg32022";
          
          $connection = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
          
          if (!$connection) {
              die("Error de conexión: " . pg_last_error());
          }
          
          $username = $_POST['user']; // El nombre de usuario ingresado por el usuario
          $password = sha1($_POST['password']); // La contraseña ingresada por el usuario y convertida a SHA-1
          
          $query = "SELECT * FROM users WHERE email = '$username'";
          
          $result = pg_query($connection, $query);
          
          if (!$result) {
              die("Error en la consulta: " . pg_last_error());
          }
          
          $row = pg_fetch_assoc($result);
          
          if ($row) {
                $userProvidedPassword = $_POST['password'];

            // Contraseña hash almacenada en la base de datos (obtenida desde Devise)
                $storedPasswordHash = $row['encrypted_password']; // Reemplaza con el valor real

            if (password_verify($userProvidedPassword, $storedPasswordHash)) {
                pg_close($connection);
                
                $dataFinal = array();
                $host = "138.197.10.249";
                $port = "5432";
                $dbname = "cvs_urban";
                $user = "comercio";
                $password = "j0rg32022";
                
                $connection = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
                
                if (!$connection) {
                    die("Error de conexión: " . pg_last_error());
                }


                $search_value = $row["id"];
                $sql = "SELECT * FROM public.users WHERE id = '$search_value'";
                $result = pg_query($connection, $sql);
                $rowUser = pg_fetch_assoc($result);
    
               if ($rowUser) {
                    // El registro ya existe, realiza una actualización
                    $query = "UPDATE public.users SET email = $1,encrypted_password = $2,reset_password_token = $3,reset_password_sent_at = $4, remember_created_at = $5, sign_in_count = $6, current_sign_in_at = $7, last_sign_in_at = $8, current_sign_in_ip = $9, last_sign_in_ip = $10, created_at = $11, updated_at = $12, name = $13, last_name = $14, business_name = $15, phone = $16, type_identification = $17, identification = $18, role = $19, status = $20, investor = $21, avatar_file_name = $22, avatar_content_type = $23, avatar_file_size = $24, avatar_updated_at = $25, accept_terms_conditions = $26, social_url = $27, membership = $28, plan = $29, contacted = $30, is_influencer = $31, influencer_id = $32, urban_code = $33 WHERE id = $34";
                    $stmt = pg_prepare($connection, "update_query", $query);
                    $update_result = pg_execute($connection, "update_query", array($row['email'], $row['encrypted_password'], $row['reset_password_token'], $row['reset_password_sent_at'], $row['remember_created_at'], $row['sign_in_count'], $row['current_sign_in_at'], $row['last_sign_in_at'], $row['current_sign_in_ip'], $row['last_sign_in_ip'], $row['created_at'], $row['updated_at'], $row['name'], $row['last_name'], $row['business_name'], $row['phone'], $row['type_identification'], $row['identification'], $row['role'], $row['status'], $row['investor'], $row['avatar_file_name'], $row['avatar_content_type'], $row['avatar_file_size'], $row['avatar_updated_at'], $row['accept_terms_conditions'], $row['social_url'], $row['membership'], $row['plan'], $row['contacted'], $row['is_influencer'], $row['influencer_id'], $row['urban_code'],$row['id']));          
                } else {
                    // El registro no existe, realiza una inserción
                    $query = "INSERT INTO public.users(
                        id, email, encrypted_password, reset_password_token, reset_password_sent_at, remember_created_at, sign_in_count, current_sign_in_at, last_sign_in_at, current_sign_in_ip, last_sign_in_ip, created_at, updated_at, name, last_name, business_name, phone, type_identification, identification, role, status, investor, avatar_file_name, avatar_content_type, avatar_file_size, avatar_updated_at, accept_terms_conditions, social_url, membership, plan, contacted, is_influencer, influencer_id, urban_code)
                        VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9, $10, $11, $12, $13, $14, $15, $16, $17, $18, $19, $20, $21, $22, $23, $24, $25, $26, $27, $28, $29, $30, $31, $32, $33, $34)";
                    $result = pg_query_params($connection, $query, array($row['id'], $row['email'], $row['encrypted_password'], $row['reset_password_token'], $row['reset_password_sent_at'], $row['remember_created_at'], $row['sign_in_count'], $row['current_sign_in_at'], $row['last_sign_in_at'], $row['current_sign_in_ip'], $row['last_sign_in_ip'], $row['created_at'], $row['updated_at'], $row['name'], $row['last_name'], $row['business_name'], $row['phone'], $row['type_identification'], $row['identification'], $row['role'], $row['status'], $row['investor'], $row['avatar_file_name'], $row['avatar_content_type'], $row['avatar_file_size'], $row['avatar_updated_at'], $row['accept_terms_conditions'], $row['social_url'], $row['membership'], $row['plan'], $row['contacted'], $row['is_influencer'], $row['influencer_id'], $row['urban_code']));          
                   
                }
                $_SESSION['outh'] = 1;
                $_SESSION['client'] = $row;

                echo  $row['id'];
            } else {
                echo 0;
            }
          } else {
              echo 0;
          }
        
        }else{
            $this->view->render($this,'login',array(1)); 
        }

    }

    public function logout(){
   
            $_SESSION = array();
            clearstatcache();
            $_SESSION = array();
            session_destroy();
            header("Cache-Control: no-cache, no-store, must-revalidate");
            header("Pragma: no-cache");
            header("Expires: 0");
            session_write_close();
            sleep(2);
            $this->view->render($this,'login',array(1)); 
        
        
        
    }
}

 ?>
<?php
    namespace App\Controller;

    use App\Helper\GenerateHelper as GenerateHelper;
    use App\Model\UserModel as UserModel;
    use App\Helper\ValidateHelper as ValidateHelper;
    use App\Helper\InputHelper as InputHelper;
    use App\Helper\HashHelper as HashHelper;
    use App\Helper\ResponseHelper as ResponseHelper;
   

    class UserController{
        
        public function view(array $data){
            $user = (new UserModel())->find();
            if ($user->count() > 0) {
                $user = $user->fetch(true);
                foreach ($user as $userItem){
                    var_dump($userItem->data());    
                }
            }
            else {
                echo $user->fail()->getMessage();
            }
   
        }

        public function add(array $data){
            $user = new UserModel();
            $user->sid = GenerateHelper::randomSid();
            $user->name = $data['name'];
            $user->email = $data['email'];
            if (!InputHelper::isValidEmail($data['email'])) {
                ResponseHelper::send(REQUEST_ERROR, 'Email is invalid');
            }
            $user->password = HashHelper::encrypt($data['password'], $user->sid);
            if (!InputHelper::isValidPassword($data['password']) && $data['password'] != $data['passwordConfirm']) {
                ResponseHelper::send(REQUEST_ERROR, 'Password is invalid');
            }
            $user->permissionType = $data['permission'];
            if($user->save()){
                ResponseHelper::send(RESPONSE_SUCCESS, 'O cadastro foi concluído');
            } 
            else {
                echo 
                ResponseHelper::send(REQUEST_ERROR, 'Houve um erro na efetivação do cadastro');

            }

            
        }
    }
    


?>
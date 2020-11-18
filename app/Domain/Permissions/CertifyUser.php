<?php
namespace App\Domain\Permissions;

use Illuminate\Support\Facades\Auth;

/**
 * User administrative permissions rule
 * Regra de permissões administrativas do usuário
 */
class CertifyUser
{

    /*** 
     * Access permissions rule
     * Regra de permissões de acesso
    */  
   private $permissions = [
          'manager' => ['view-section', 'create-section', 'update-section', 'delete-section', 
          'view-content', 'create-content', 'view-user', 'update-user'], 
          'columnist' => ['view-content', 'create-content', 'view-user', 'update-user']   
   ];

   /**
    * Verify the administrative permission of the authenticated user
    * Verificar a permissão administrativa do usuário autenticado
    * @return [type]
    */
   private function userAuth()
   {
        return Auth::user()->permission;
   }


   /**
    * Check if the attribute exists in permissions 
    * Verificar se o atributo existe nas permissions 
    * @return [type]
    */
   public function checkPermission($role)
   {
        $check = false;
        foreach($this->permissions as $item){
            
             if(key($this->permissions) == $this->userAuth() ){
                 if(in_array($role, $item))
                     return $check = true;            
             }  
             next($this->permissions);
        }
        //if($check == false)
            //return exit('403: Usuário não autorizado ');
        return $check;    
   }



}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class custom_modal {

    public function admin_modal($modal_id_name, $class, $id, $modal_title, $body, $footer) {
       echo "<div id='$modal_id_name$id' class='modal fade $class' role='dialog'>
           <div class='modal-dialog'>
               <!-- Modal content-->
               <div class='modal-content'>
                   <div class='modal-header bg-primary'>
                     <button type='button' class='close' data-dismiss='modal'>&times;</button>
                     <h4 class='modal-title'>$modal_title</h4>
                   </div>
                   <div class='modal-body'>
                      $body
                   </div>

                   <div class='modal-footer'>
                        $footer
                   </div>
               </div>
           </div>
       </div>";
    }
}

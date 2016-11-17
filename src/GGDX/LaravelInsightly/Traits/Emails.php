<?php namespace GGDX\LaravelInsightly\Traits;

trait Emails{

    /**
     * Get Emails
     *
     * If $id set, retrieve a single email.
     *
     * @param int $id Email ID
     * @return object
     */
    public function getEmails($id = false)
    {
        return !$id ? $this->call('get','Emails') : $this->call('get','Emails/'.$id);
    }


    /**
     * Add Email Tag
     *
     * @param int $id Email ID
     * @param string $tag Tag name
     * @return object
     */
    public function createEmailTag($id = false, $tag = false)
    {
        if(!$id){
            $this->set_error('createEmailTag() -> $id must be provided.');
        }

        if(!$tag){
            $this->set_error('createEmailTag() -> $tag must be provided.');
        }

        return $this->call('post','Emails/'.$id, ['TAG_NAME' => $tag]);
    }


    /**
     * Delete Email Tag
     *
     * @param int $id Email ID
     * @param string $tag Tag name
     * @return object
     */
    public function deleteEmailTag($id = false, $tag = false)
    {
        if(!$id){
            $this->set_error('deleteEmailTag() -> $id must be provided.');
        }

        if(!$tag){
            $this->set_error('deleteEmailTag() -> $tag must be provided.');
        }

        return $this->call('delete','Emails/'.$id.'/'.$tag);
    }


    /**
     * Get an emails' comments
     *
     * @param int $id Email ID
     * @return object
     */
    public function getEmailComments($id = false)
    {
        if(!$id){
            $this->set_error('getEmailComments() -> $id must be provided.');
        }
        return $this->call('get','Emails/'.$id.'/Comments');
    }


    /**
     * Add Comment to Email
     *
     * @param int $id Email ID
     * @param array $data ['BODY' => string (HTML is allowed), 'OWNER_USER_ID' => int, 'NOTE_ID' => int, 'TASK_ID' => int]
     * @return object
     */
    public function createEmailComment($id = false, array $data = [])
    {
        if(!$id){
            $this->set_error('createEmailComment() -> $id must be provided.');
        }

        if(!count($data)){
            $this->set_error('createEmailComment() -> $data must be provided.');
        } else {
            $data = $this->dataKeysToUpper($data);

            if(empty($data['BODY'])){
                $this->set_error('createEmailComment() -> $data[\'BODY\'] must be provided.');
            }
        }

        return $this->call('post','Emails/'.$id.'/Comments', $data);
    }


    /**
     * Stop following email
     *
     * @param int $id Email ID
     */
    public function unfollowEmail($id = false)
    {
        if(!$id){
            $this->set_error('unfollowEmail() -> $id must be provided.');
        }

        return $this->call('delete','Emails/'.$id.'/Follow');
    }


    /**
     * Check email following status
     *
     * @param int $id Email ID
     * @return bool
     */
    public function isEmailFollowed($id = false)
    {
        if(!$id){
            $this->set_error('isEmailFollowed() -> $id must be provided.');
        }

        return $this->call('get','Emails/'.$id.'/Follow');
    }


    /**
     * Follow email
     *
     * @param int $id Email ID
     * @return bool
     */
     public function followEmail($id = false)
     {
         if(!$id){
             $this->set_error('followEmail() -> $id must be provided.');
         }

         return $this->call('post','Emails/'.$id.'/Follow');
     }


     /**
      * Get email attachments
      *
      * @param int $id Email ID
      * @return object
      */
      public function getEmailAttachment($id = false)
      {
          if(!$id){
              $this->set_error('getEmailAttachment() -> $id must be provided.');
          }

          return $this->call('get','Emails/'.$id.'/FileAttachments');
      }




}

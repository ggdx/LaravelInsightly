<?php namespace GGDX\LaravelInsightly\Traits;

/*
* @TODO - Add add_file_attachment method.
*/

trait Comments{


    /**
     * Get comment
     *
     * @param int $id Comment ID (REQUIRED)
     * @return object
     */
    public function getComment($id = false)
    {
        if(!$id){
            $this->set_error('getComment() -> $id must be provided.');
        }

        return $this->call('get','v2.2/Comments/'.$id);
    }

    /**
     * Get comment attachment
     *
     * @param int $id Comment ID (REQUIRED)
     * @return object
     */
    public function getCommentAttachment($id = false)
    {
        if(!$id){
            $this->set_error('getCommentAttachment() -> $id must be provided.');
        }

        return $this->call('get','v2.2/Comments/'.$id.'/FileAttachments');
    }


    /**
     * Update comment
     *
     * @param int $id Comment ID (REQUIRED)
     * @param string $body Comment (REQUIRED)
     * @return object
     */
    public function updateComment($id = false, $body = false)
    {
        if(!$id){
            $this->set_error('updateComment() -> $id must be provided.');
        }

        if(!$body || strlen($body) < 1){
            $this->set_error('updateComment() -> $body must be set.');
        }

        return $this->call('put','v2.2/Comments/'.$id, ['BODY' => $body]);
    }


    /**
     * Delete comment
     *
     * @param int $id Comment ID (REQUIRED)
     * @return object
     */
    public function deleteComment($id = false)
    {
        if(!$id){
            $this->set_error('deleteComment() -> $id must be provided.');
        }
        return $this->call('delete','v2.2/Comments/'.$id);
    }
}

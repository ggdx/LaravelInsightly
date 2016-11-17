<?php namespace GGDX\LaravelInsightly\Traits;

trait FileAttachments{

    /**
     * Get attachment
     *
     * @param int $id Attachment ID
     * @return object
     */
    public function getAttachment($id = false)
    {
        if(!$id){
            $this->set_error('getAttachment() -> $id must be provided.');
        }
        return $this->call('get','FileAttachments/'.$id);
    }


    /**
     * Delete attachment
     *
     * @param int $id Attachment ID
     */
    public function deleteAttachment($id = false)
    {
        if(!$id){
            $this->set_error('deleteAttachment() -> $id must be provided.');
        }
        return $this->call('delete','FileAttachments/'.$id);
    }
}

<?php namespace GGDX\LaravelInsightly\Traits;

trait FileCategories{

    /**
     * Get file categories (or single if $id)
     *
     * @param int $id File Category ID
     * @return object
     */
    public function getFileCategories($id = false)
    {
        if(!$id){
            return $this->call('get','FileFileCategories');
        }
        return $this->call('get','FileFileCategories/'.$id);
    }


    /**
     * Create/Update file categories
     *
     * @param array $data ['CATEGORY_ID' => int, 'CATEGORY_NAME' => string, 'ACTIVE' => bool, 'BACKGROUND_COLOR' => string (hex, i.e. F4C00A)]
     * @return object
     */
    public function saveFileCategory(array $data = [])
    {
        if(empty($data['CATEGORY_NAME'])){
            $this->set_error('saveFileCategory() -> $data[\'CATEGORY_NAME\'] must be provided.');
        }

        if(empty($data['CATEGORY_ID'])){
            return $this->call('post','FileFileCategories', $data);
        }

        return $this->call('put','FileFileCategories', $data);
    }


    /**
     * Deactivate file category
     *
     * @param int $id File Category ID
     */
    public function deleteFileCategory($id = false)
    {
        if(!$id){
            $this->set_error('deleteFileCategory() -> $id must be provided.');
        }

        return $this->call('delete','FileCategories/'.$id);
    }
}

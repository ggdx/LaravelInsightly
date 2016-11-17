<?php namespace GGDX\LaravelInsightly\Traits;

trait Events{

    /**
     * Get all events (singular if $id)
     *
     * @param int $id Event ID
     * @return object
     */
    public function getEvents($id = false)
    {
        return !$id ? $this->call('get','Events') : $this->call('get','Events/'.$id);
    }

    /**
     * Get single event
     *
     * @param int $id Event ID
     * @return object
     */
    public function getEvent($id = false)
    {
        if(!$id){
            $this->set_error('getEvent() -> $id must be provided.');
        }

        return $this->getEvents($id);
    }


    /**
     * Create/Update event
     *
     * @param int $id Event ID
     * @param array $data ['EVENT_ID' => int, 'TITLE' => string, 'LOCATION' => string, 'DETAILS' => string, 'START_DATE_UTC' => string (ISO 8601), 'END_DATE_UTC' => string (ISO 8601), 'ALL_DAY' => bool, 'PUBLICLY_VISIBLE' => bool, 'REMINDER_DATE_UTC' => string (ISO 8601), 'OWNER_USER_ID' => int]
     * @return object
     */
    public function saveEvent(array $data = [])
    {
        if(!count($data)){
            $this->set_error('saveEvent() -> $data must be provided.');
        } else {
            $data = $this->dataKeysToUpper($data);

            if(empty($data['TITLE'])){
                $this->set_error('saveEvent() -> $data[\'TITLE\'] must be provided.');
            }

            if(empty($data['START_DATE_UTC'])){
                $this->set_error('saveEvent() -> $data[\'START_DATE_UTC\'] must be provided.');
            }

            if(empty($data['END_DATE_UTC'])){
                $this->set_error('saveEvent() -> $data[\'END_DATE_UTC\'] must be provided.');
            }
        }

        if(empty($data['EVENT_ID'])){
            return $this->call('post','Events', $data)
        }

        return $this->call('put','Events', $data);
    }


    /**
     * Delete event
     *
     * @param int $id Event ID
     */
    public function deleteEvent($id = false)
    {
        if(!$id){
            $this->set_error('deleteEvent() -> $id must be provided.');
        }

        return $this->call('delete', 'Events/'.$id);
    }
}

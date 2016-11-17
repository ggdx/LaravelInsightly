<?php namespace GGDX\LaravelInsightly\Traits;

trait LeadStatus{

    /**
     * Get all lead Statuses
     *
     * @return object
     */
    public function getLeadStatuses()
    {
        return $this->call('get','LeadStatuses');
    }

    /**
     * Create / Update lead Status
     *
     * @param array $data ['LEAD_STATUS_ID' => int, 'LEAD_STATUS' => string, 'FIELD_ORDER' => int, 'STATUS_TYPE' => int]
     * @return object
     */
    public function saveLeadStatus(array $data = [])
    {
        $data = $this->dataKeysToUpper($data);

        return empty($data['LEAD_STATUS_ID']) ? $this->call('post','LeadStatuses', $data) : $this->call('put','LeadStatuses', $data);
    }


    /**
     * Delete lead Status
     *
     * @param int $id
     */
    public function deleteLeadStatus($id = false)
    {
        if(!$id){
            $this->set_error('deleteLeadStatus() -> $id must be provided.');
        }
        return $this->call('delete','LeadStatuses/'.$id);
    }
}

<?php namespace GGDX\LaravelInsightly\Traits;

/*
* @TODO - Add addContactImage method.
*/

trait Contacts{

    /**
     * Get contacts
     *
     *
     * @param array $filter Any combination of the following - ['email' => string, 'tag' => string, 'phone_number' => string, 'first_name' => string, 'last_name' => string, 'city' => string, 'state' => string, 'postcode' => string, 'country' => string, 'organisation' => string]
     * @return object
     */
    public function getContacts($filter = false)
    {
        if($filter != false && count($filter) > 0){
            return $this->call('get','Contacts/Search');
        }

        return $this->call('get','Contacts');
    }


    /**
     * Get single contact
     *
     * @param int $id Contact ID - Required
     * @return object
     */
    public function getContact($id = false)
    {
       if($id != false){
           $this->set_error('getContact() -> $id must be provided.');
       }

       return $this->call('get','Contacts/'.$id);
    }


    /**
     * Add / Update contact
     *
     * @param array $data Contact data. NOTE: At least $data['FIRST_NAME'] must be provided.
     * @param int $id Contact ID. If false, new contact created otherwise contact updated.
     * @return object
     */
    public function saveContact(array $data = [], $id = false)
    {
        if(!count($data)){
            $this->set_error('saveContact() -> $data must have stuff in it.');
        }

        $data = $this->dataKeysToUpper($data);

        if(empty($data['FIRST_NAME'])){
            $this->set_error('saveContact() -> $data[\'FIRST_NAME\'] is required.');
        }

        if(!$id){
            return $this->call('post','Contacts', $data)
        }

        $data['CONTACT_ID'] = $id;

        return $this->call('put','Contacts', $data);
    }


    /**
     * Delete contact
     *
     * @param int $id Contact ID (REQUIRED)
     * @return string
     */
    public function deleteContact($id = false)
    {
        if(!$id){
            $this->set_error('deleteContact() -> $id must be set.');
        }

        return $this->call('delete','Contacts/'.$id);
    }


    /**
     * Get contact image
     *
     * @param int $id Contact ID (REQUIRED)
     * @return string
     */
    public function getContactImage($id = false)
    {
        if(!$id){
            $this->set_error('getContactImage() -> $id must be set.');
        }

        return $this->call('get','Contacts/'.$id.'/Image');
    }


    /**
     * Delete contact image
     *
     * @param int $id Contact ID (REQUIRED)
     * @return string
     */
    public function deleteContactImage($id = false)
    {
        if(!$id){
            $this->set_error('deleteContactImage() -> $id must be set.');
        }

        return $this->call('delete','Contacts/'.$id.'/Image');
    }


    /**
     * Add contact address
     *
     * @param array $data Address data. ['ADDRESS_TYPE' => string, 'STREET' => string, 'CITY' => string, 'STATE' => string, 'POSTCODE' => string, 'COUNTRY' => string]
     * @param int $id Contact ID.
     */
    public function addContactAddress(array $data = [], $id = false)
    {
        if(!$id){
            $this->set_error('addContactAddress() -> $id must be set.');
        }

        return $this->call('post','Contacts/'.$id.'/Addresses', $data);
    }


    /**
     * Update contact address
     *
     * NOTE: $data['ADDRESS_ID'] is optional, however if you have more than one address, you should use this.
     *
     * @param array $data Address data. ['ADDRESS_ID' => int, 'ADDRESS_TYPE' => string, 'STREET' => string, 'CITY' => string, 'STATE' => string, 'POSTCODE' => string, 'COUNTRY' => string]
     * @param int $id Contact ID.
     */
    public function updateContactAddress(array $data = [], $id = false)
    {
        if(!$id){
            $this->set_error('updateContactAddress() -> $id must be set.');
        }

        return $this->call('put','Contacts/'.$id.'/Addresses', $data);
    }


    /**
     * Delete contact address
     *
     * @param int $id User ID
     * @param int $address_id Address ID.
     */
    public function deleteContactAddress($id = false, $address_id = false)
    {
        if(!$id){
            $this->set_error('deleteContactAddress() -> $id must be set.');
        }
        if(!$address_id){
            $this->set_error('deleteContactAddress() -> $address_id must be set.');
        }

        return $this->call('delete','Contacts/'.$id.'/Addresses/'.$address_id);
    }


    /**
     * Add / update contact info
     *
     * If !$data['CONTACT_INFO_ID'], add new otherwise update.
     *
     * @param array $data. ['CONTACT_INFO_ID' => int, 'TYPE' => string REQUIRED, 'SUBTYPE' => string, 'LABEL' => string REQUIRED, 'DETAIL' => string REQUIRED]
     * @param int $id Contact ID.
     */
    public function saveContactInfo(array $data = [], $id = false)
    {
        if(!$id){
            $this->set_error('addContactInfo() -> $id must be set.');
        }

        if(!count($data)){
            $this->set_error('addContactInfo() -> $data must be provided.');
        } else {
            $data = $this->dataKeysToUpper($data);

            if(empty($data['TYPE'])){
                $this->set_error('addContactInfo() -> $data[\'TYPE\'] must be provided.');
            }

            if(empty($data['LABEL'])){
                $this->set_error('addContactInfo() -> $data[\'LABEL\'] must be provided.');
            }

            if(empty($data['DETAIL'])){
                $this->set_error('addContactInfo() -> $data[\'DETAIL\'] must be provided.');
            }
        }

        if(!empty($data['CONTACT_INFO_ID'])){
            return $this->call('put','Contacts/'.$id.'/ContactInfos', $data);
        }

        return $this->call('post','Contacts/'.$id.'/ContactInfos', $data);
    }


    /**
     * Delete contact info
     *
     * @param int $id User ID
     * @param int $info_id Info ID.
     */
    public function deleteContactInfo($id = false, $info_id = false)
    {
        if(!$id){
            $this->set_error('deleteContactInfo() -> $id must be set.');
        }
        if(!$info_id){
            $this->set_error('deleteContactInfo() -> $info_id must be set.');
        }

        return $this->call('delete','Contacts/'.$id.'/ContactInfos/'.$info_id);
    }


    /**
     * Save contact date entry
     *
     * !$data['DATE_ID'] = create, otherwise update
     *
     * @param int $id Contact ID
     * @param int $data Date information - ['DATE_ID' => int, 'OCCASION_NAME' => string, 'OCCASION_DATE' => string (ISO 8601), 'REPEAT_YEARLY' => bool, 'CREATE_TASK_YEARLY' => bool ]
     * @return object
     */
    public function saveContactDate($id = false, array $data = [])
    {
        if(!$id){
            $this->set_error('saveContactDate() -> $id must be set.');
        }

        $data = $this->dataKeysToUpper($data);

        if(!empty($data['DATE_ID'])){
            return $this->call('put','Contacts/'.$id.'/Dates', $data);
        }

        return $this->call('post','Contacts/'.$id.'/Dates', $data);
    }


    /**
     * Delete contact date entry
     *
     * @param int $id User ID
     * @param int $date_id Date ID.
     */
    public function deleteContactDate($id = false, $date_id = false)
    {
        if(!$id){
            $this->set_error('deleteContactDate() -> $id must be set.');
        }
        if(!$date_id){
            $this->set_error('deleteContactDate() -> $date_id must be set.');
        }

        return $this->call('delete','Contacts/'.$id.'/Dates/'.$date_id);
    }



    /**
     * Update contact custom field
     *
     * @param int $id Contact ID
     * @param array $data ['CUSTOM_FIELD_ID' => int, 'FIELD_VALUE' => mixed]
     * @return return type
     */
    public function updateContactCustomField($id = false, array $data = [])
    {
        if(!$id){
            $this->set_error('updateContactCustomField() -> $id must be set.');
        }

        if(!count($data)){
            $this->set_error('updateContactCustomField() -> $data must be set.');
        } else {
            $data = $this->dataKeysToUpper($data);

            if(empty($data['CUSTOM_FIELD_ID'])){
                $this->set_error('updateContactCustomField() -> $data[\'CUSTOM_FIELD_ID\'] must be set.');
            }

            if(empty($data['FIELD_VALUE'])){
                $this->set_error('updateContactCustomField() -> $data[\'FIELD_VALUE\'] must be set.');
            }
        }

        return $this->call('put','Contacts/'.$id.'/CustomFields',$data);
    }


    /**
     * Delete contact custom field
     *
     * @param int $id User ID
     * @param int $cf_id Date ID.
     */
    public function deleteContactCustomField($id = false, $cf_id = false)
    {
        if(!$id){
            $this->set_error('deleteContactCustomField() -> $id must be set.');
        }

        if(!$cf_id){
            $this->set_error('deleteContactCustomField() -> $cf_id must be set.');
        }

        return $this->call('delete','Contacts/'.$id.'/CustomFields/'.$cf_id);
    }


    /**
     * Add tag to contact
     *
     * @param int $id User ID
     * @param string $tag Tag name
     */
    public function addContactTag($id = false, $tag = false)
    {
        if(!$id){
            $this->set_error('addContactTag() -> $id must be set.');
        }

        if(!$tag){
            $this->set_error('addContactTag() -> $tag must be set.');
        }

        return $this->call('post','Contacts/'.$id.'/Tags', ['TAG_NAME' => $tag]);
    }


    /**
     * Delete contact tag
     *
     * @param int $id User ID
     * @param string $tag Tag name
     */
    public function deleteContactTag($id = false, $tag = false)
    {
        if(!$id){
            $this->set_error('deleteContactTag() -> $id must be set.');
        }

        if(!$tag){
            $this->set_error('deleteContactTag() -> $tag must be set.');
        }

        return $this->call('delete','Contacts/'.$id.'/Tags/'.$tag);
    }


    /**
     * Get contact events
     *
     * @param int $id Contact ID
     * @return object
     */
    public function getContactEvents($id = false)
    {
        if(!$id){
            $this->set_error('getContactEvents() -> $id must be set.');
        }

        return $this->call('get','Contacts/'.$id.'/Events');
    }


    /**
     * Get contact notes
     *
     * @param int $id Contact ID
     * @return object
     */
    public function getContactNotes($id = false)
    {
        if(!$id){
            $this->set_error('getContactNotes() -> $id must be set.');
        }

        return $this->call('get','Contacts/'.$id.'/Notes');
    }


    /**
     * Create contact note
     *
     * @param int $id Contact ID
     * @param array $data
     * @return object
     */
    public function createContactNote($id = false, array $data = [])
    {
        if(!$id){
            $this->set_error('createContactNote() -> $id must be set.');
        }

        if(!count($data)){
            $this->set_error('createContactNote() -> $data must be set.');
        } else {
            $data = $this->dataKeysToUpper($data);

            if(empty($data['TITLE'])){
                $this->set_error('createContactNote() -> $data[\'TITLE\'] must be set.');
            }
        }

        return $this->call('post','Contacts/'.$id.'/Notes', $data);
    }
}

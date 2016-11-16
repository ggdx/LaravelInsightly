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
            return $this->call('get','v2.2/Contacts/Search');
        }

        return $this->call('get','v2.2/Contacts');
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

       return $this->call('get','v2.2/Contacts/'.$id);
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
            return $this->call('post','v2.2/Contacts', $data)
        }

        $data['CONTACT_ID'] = $id;

        return $this->call('put','v2.2/Contacts', $data);
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

        return $this->call('delete','v2.2/Contacts/'.$id);
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

        return $this->call('get','v2.2/Contacts/'.$id.'/Image');
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

        return $this->call('delete','v2.2/Contacts/'.$id.'/Image');
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

        return $this->call('post','v2.2/Contacts/'.$id.'/Addresses', $data);
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

        return $this->call('put','v2.2/Contacts/'.$id.'/Addresses', $data);
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

        return $this->call('put','v2.2/Contacts/'.$id.'/Addresses/'.$address_id);
    }
}

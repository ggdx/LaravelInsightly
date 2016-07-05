<?php namespace GGDX\LaravelInsightly;

use Exception;

/**
 * Enables communication with the Insightly API (V2.1)
 *
 *
 *
 * 1 - Comments
 * 2 - Contacts
 * 3 - Custom Fields
 * 4 - Emails
 * 5 - Calendar Events
 * 6 - Files & Attachments
 * 7 - Leads
 * 8 - Notes
 * 9 - Opportunities
 * 10 - Organisations
 * 11 - Pipelines
 * 12 - Projects
 * 13 - Relationships
 * 14 - Tags
 * 15 - Tasks
 * 16 - Users
 * 17 - Misc.
 * 18 - Helper methods
 */

class Insightly{

    /*
    *    Guzzle
    *
    *   @var \DanW\LaravelInsightly\InsightlyRequest
    */
    private $request;


    public function __construct($config)
    {
        $this->request = new InsightlyRequest($config['api_key']);
    }



    /***********************        COMMENTS          *************************/
    // Gets a Comment
    public function getComment($id = false)
    {
        if(!$id){
            return false;
        }
        return $this->request->get('v2.2/Comments/'.$id);
    }


    // Updates a Comment
    public function updateComment($id = false, $data = false)
    {
        if(!$id){
            return false;
        }
        return $this->request->put('v2.2/Comments', $data = false);
    }


    // Deletes a Comment
    public function deleteComment($id = false)
    {
        if(!$id){
            return false;
        }
        return $this->request->put('v2.2/Comments/'.$id);
    }



    /***********************        CONTACTS          *************************/
    // Gets a list of Contacts (filtered)
    public function searchContacts(array $filter = [])
    {
        return $this->request->get('v2.2/Contacts/Search',$filter);
    }

    // Gets a basic list of Contacts
    public function getContacts(array $data = [])
    {
        return $this->request->get('v2.2/Contacts',$data);
    }


    // Gets a Contact
    public function getContact($id = false)
    {
        if(!$id){
            return false;
        }
        return $this->request->get('v2.2/Contacts/'.$id);
    }


    // Adds a Contact
    public function createContact(array $data = [])
    {
        return $this->request->post('v2.2/Contacts',$data);
    }


    // Updates a Contact
    public function updateContact(array $data = [])
    {
        return $this->request->put('v2.2/Contacts',$data);
    }


    // Deletes a Contact
    public function deleteContact($id = false)
    {
        if(!$id){
            return false;
        }
        return $this->request->delete('v2.2/Contacts/'.$id);
    }


    // Gets a Contact's Emails
    public function getContactEmails($id = false)
    {
        if(!$id){
            return false;
        }
        return $this->request->get('v2.2/Contacts/'.$id.'/Emails');
    }


    // Gets a Contact's Notes
    public function getContactNotes($id = false)
    {
        if(!$id){
            return false;
        }
        return $this->request->get('v2.2/Contacts/'.$id.'/Notes');
    }


    // Gets a Contact's Tasks
    public function getContactTasks($id = false)
    {
        if(!$id){
            return false;
        }
        return $this->request->get('v2.2/Contacts/'.$id.'/Tasks');
    }


    // Gets a Contact's Image
    public function getContactImage($id = false)
    {
        if(!$id){
            return false;
        }
        return $this->request->get('v2.2/Contacts/'.$id.'/Image');
    }


    // Deletes a Contact's Image
    public function deleteContactImage($id = false)
    {
        if(!$id){
            return false;
        }
        return $this->request->delete('v2.2/Contacts/'.$id.'/Image');
    }



    /***********************        CUSTOM FIELDS          *************************/
    // (if !$id) Gets a list of Custom Fields
    // (if $id) Gets a Custom Field
    public function getCustomFields($id = false)
    {
        if(!$id){
            return $this->request->get('v2.2/CustomFields');
        }
        return $this->request->get('v2.2/CustomFields/'.$id);
    }



    /***********************       EMAIL          *************************/
    // Search
    public function searchEmails(array $filter = [])
    {
        return $this->request->get('v2.2/Emails/Search',$filter);
    }

    // Gets a list of Emails
    public function getEmails(array $filter = [])
    {
        return $this->request->get('v2.2/Emails',$filter);
    }


    // Gets an Email
    public function getEmail($id = false)
    {
        if(!$id){
            return false;
        }
        return $this->request->get('v2.2/Emails/'.$id);
    }


    // Gets an Email's Comments
    public function getEmailComments($id = false)
    {
        if(!$id){
            return false;
        }
        return $this->request->get('v2.2/Emails/'.$id.'/Comments');
    }


    // Adds a Comment to an Email
    public function createEmailComment($id = false, array $data = [])
    {
        if(!$id){
            return false;
        }
        return $this->request->post('v2.2/Emails/'.$id.'/Comments');
    }



    /***********************       CALENDAR EVENTS          *************************/
    // Search events
    public function searchEvents(array $filter = [])
    {
        return $this->request->get('v2.2/Events/Search',$filter);
    }


    // Gets a list of Calendar Events
    public function getEvents(array $filter = [])
    {
        return $this->request->get('v2.2/Events');
    }


    public function getEvent($id = false)
    {
        return $this->request->get('v2.2/Events/'.$id);
    }


    // Adds a Calendar Event
    public function createEvent(array $data = [])
    {
        return $this->request->post('v2.2/Events', $data);
    }


    // Updates a Calendar Event
    public function updateEvent(array $data = [])
    {
        return $this->request->put('v2.2/Events', $data);
    }


    // Deletes a Calendar Event
    public function deleteEvent($id = false)
    {
        if(!$id){
            return false;
        }
        return $this->request->delete('v2.2/Events/'.$id);
    }



    /***********************       FILES          *************************/
    // Gets a File Attachment
    public function getFile($id = false)
    {
        if(!$id){
            return false;
        }
        return $this->request->get('v2.2/FileAttachments/'.$id);
    }


    // Deletes a File Attachment
    public function deleteFile($id = false)
    {
        if(!$id){
            return false;
        }
        return $this->request->delete('v2.2/FileAttachments/'.$id);
    }


    // (if !$id) Gets a list of File Categories
    // (if $id) Gets a File Category
    public function getFileCategories($id = false)
    {
        if(!$id){
            return $this->request->get('v2.2/FileCategories');
        }
        return $this->request->get('v2.2/FileCategories/'.$id);
    }


    // Adds a File Category, NOTE: you must be a system administrator to use this endpoint.
    public function createFileCategory(array $data = [])
    {
        return $this->request->post('v2.2/FileCategories',$data);
    }


    // Updates a File Category, NOTE: you must be a system administrator to use this endpoint.
    public function updateFileCategory(array $data = [])
    {
        return $this->request->put('v2.2/FileCategories',$data);
    }


    // Deletes a File Category, NOTE: you must be a system administrator to use this endpoint.
    public function deleteFileCategories($id = false)
    {
        if(!$id){
            return false;
        }
        return $this->request->delete('v2.2/FileCategories/'.$id);
    }



    /***********************       LEADS          *************************/
    // Gets a list of Leads
    public function getLeads(array $filter = [])
    {
        $str = $this->urlVars($filter);
        return $this->request->get('v2.2/Leads'.$str);
    }


    // Gets a Lead
    public function getLead($id = false)
    {
        if(!$id){
            return false;
        }
        return $this->request->get('v2.2/Leads/'.$id);
    }


    // Adds a Lead
    public function createLead(array $data = [])
    {
        return $this->request->post('v2.2/Leads', $data);
    }


    // Updates a Lead
    public function updateLead(array $data = [])
    {
        return $this->request->put('v2.2/Leads', $data);
    }


    // Deletes a Lead
    public function deleteLead($id = false)
    {
        if(!$id){
            return false;
        }
        return $this->request->delete('v2.2/Leads/'.$id);
    }


    // Gets a Lead's Emails
    public function getLeadEmails($id = false)
    {
        if(!$id){
            return false;
        }
        return $this->request->get('v2.2/Leads/'.$id.'/Emails');
    }


    // Gets a Lead's Notes
    public function getLeadNotes($id = false)
    {
        if(!$id){
            return false;
        }
        return $this->request->get('v2.2/Leads/'.$id.'/Notes');
    }


    // Gets a Lead's Tasks
    public function getLeadTasks($id = false)
    {
        if(!$id){
            return false;
        }
        return $this->request->get('v2.2/Leads/'.$id.'/Tasks');
    }


    // Gets a list of Lead Sources
    public function getLeadSources()
    {
        return $this->request->get('v2.2/LeadSources');
    }



    /***********************       NOTES          *************************/
    // (if !$id) Gets a list of Notes
    // (if $id) Gets a Note
    public function getNotes($id = false)
    {
        if(!$id){
            return $this->request->get('v2.2/Notes');
        }
        return $this->request->get('v2.2/Notes/'.$id);
    }


    // Adds a note
    public function createNote(array $data = [])
    {
        return $this->request->post('v2.2/Notes', $data);
    }


    // Update a Note
    public function updateNote(array $data = [])
    {
        return $this->request->put('v2.2/Notes', $data);
    }


    // Delete a Note
    public function deleteNote($id = false)
    {
        if(!$id){
            return false;
        }
        return $this->request->delete('v2.2/Notes/'.$id);
    }


    // Get a Notes' Comments
    public function getNoteComments($id = false)
    {
        if(!$id){
            return false;
        }
        return $this->request->delete('v2.2/Notes/'.$id.'/Comments');
    }


    // Add a Comment to a Note
    public function createNoteComment(array $data = [], $id = false)
    {
        if(!$id){
            return false;
        }
        return $this->request->post('v2.2/Notes/'.$id.'/Comments',$data);
    }



    /***********************       OPPORTUNITIES          *************************/
    // Gets a list of Opportunities
    public function getOpportunities(array $filter = [])
    {
        $str = $this->urlVars($filter);
        return $this->request->get('v2.2/Opportunities'.$str);
    }


    // Gets an Opportunity
    public function getOpportunity($id = false)
    {
        if(!$id){
            return false;
        }
        return $this->request->get('v2.2/Opportunities/'.$id);
    }


    // Create an Opportunity
    public function createOpportunity(array $data = [])
    {
        return $this->request->post('v2.2/Opportunities',$data);
    }


    // Update an Opportunity
    public function updateOpportunity(array $data = [])
    {
        return $this->request->put('v2.2/Opportunities',$data);
    }


    // Gets the history of States and Reasons for an Opportunity.
    public function getOpportunityHistoryStates($id = false)
    {
        if(!$id){
            return false;
        }
        return $this->request->get('v2.2/Opportunities/'.$id.'/StateHistory');
    }


    // Gets an Opportunitys' Emails
    public function getOpportunityEmails($id = false)
    {
        if(!$id){
            return false;
        }
        return $this->request->get('v2.2/Opportunities/'.$id.'/Emails');
    }


    // Gets an Opportunitys' Emails
    public function getOpportunityNotes($id = false)
    {
        if(!$id){
            return false;
        }
        return $this->request->get('v2.2/Opportunities/'.$id.'/Notes');
    }


    // Gets an Opportunitys' Tasks
    public function getOpportunityTasks($id = false)
    {
        if(!$id){
            return false;
        }
        return $this->request->get('v2.2/Opportunities/'.$id.'/Tasks');
    }


    // Gets an Opportunitys' Image
    public function getOpportunityImage($id = false)
    {
        if(!$id){
            return false;
        }
        return $this->request->get('v2.2/Opportunities/'.$id.'/Image');
    }


    // (if !$id) Gets a list of Opportunity Categories
    // (if $id) Gets an Opportunity Category
    public function getOpportunityCategories($id = false)
    {
        if(!$id){
            return $this->request->get('v2.2/OpportunityCategories');
        }
        return $this->request->get('v2.2/OpportunityCategories/'.$id);
    }


    // Create an Opportunity Category
    public function createOpportunityCategory(array $data = [])
    {
        return $this->request->post('v2.2/OpportunityCategories',$data);
    }


    // Update an Opportunity Category
    public function updateOpportunityCategory(array $data = [])
    {
        return $this->request->put('v2.2/OpportunityCategories',$data);
    }


    // Delete an Opportunity Category
    public function deleteOpportunityCategory($id = false)
    {
        if(!$id){
            return false;
        }
        return $this->request->delete('v2.2/OpportunityCategories/'.$id);
    }


    // Update an Opportunity State
    public function updateOpportunityState(array $data = [], $id = false)
    {
        if(!$id){
            return false;
        }
        return $this->request->put('v2.2/OpportunityStateChange/'.$id,$data);
    }


    // Gets a list of Opportunity State Reasons
    public function getOpportunityStateReasons()
    {
        return $this->request->get('v2.2/OpportunityStateReasons');
    }



    /***********************       ORGANISATIONS          *************************/
    // Gets a list of Organisations
    public function getOrganisations(array $filter = [])
    {
        $str = $this->urlVars($filter);
        return $this->request->get('v2.2/Organisations'.$str);
    }


    // Gets a an Organisation
    public function getOrganisation($id = false)
    {
        if(!$id){
            return false;
        }
        return $this->request->get('v2.2/Organisations/'.$id);
    }


    // Creates a an Organisation
    public function createOrganisation(array $data = [])
    {
        return $this->request->post('v2.2/Organisations', $data);
    }


    // Updates a an Organisation
    public function updateOrganisation(array $data = [])
    {
        return $this->request->put('v2.2/Organisations', $data);
    }


    // Gets a an Organisation
    public function deleteOrganisation($id = false)
    {
        if(!$id){
            return false;
        }
        return $this->request->delete('v2.2/Organisations/'.$id);
    }


    // Gets a an Organisations' Emails
    public function getOrganisationEmails($id = false)
    {
        if(!$id){
            return false;
        }
        return $this->request->get('v2.2/Organisations/'.$id.'/Emails');
    }


    // Gets a an Organisations' Tasks
    public function getOrganisationTasks($id = false)
    {
        if(!$id){
            return false;
        }
        return $this->request->get('v2.2/Organisations/'.$id.'/Tasks');
    }


    // Gets a an Organisations' Notes
    public function getOrganisationNotes($id = false)
    {
        if(!$id){
            return false;
        }
        return $this->request->get('v2.2/Organisations/'.$id.'/Notes');
    }


    // Gets a an Organisations' Image
    public function getOrganisationImage($id = false)
    {
        if(!$id){
            return false;
        }
        return $this->request->get('v2.2/Organisations/'.$id.'/Image');
    }


    // For all you Yanks out there.
    public function getOrganizations(array $filter = []){
        return $this->getOrganisations($filter);
    }
    public function getOrganization($id){
        return $this->getOrganisation($id);
    }
    public function createOrganization(array $data = []){
        return $this->createOrganisation($data);
    }
    public function updateOrganization(array $data = []){
        return $this->updateOrganisation($data);
    }
    public function deleteOrganization($id){
        return $this->deleteOrganisation($id);
    }
    public function getOrganizationEmails($id){
        return $this->getOrganisationEmails($id);
    }
    public function getOrganizationNotes($id){
        return $this->getOrganisationNotess($id);
    }
    public function getOrganizationTasks($id){
        return $this->getOrganisationTasks($id);
    }
    public function getOrganizationImage($id){
        return $this->getOrganisationImage($id);
    }



    /***********************       PIPELINES          *************************/
    // (if !$id) Gets a list of Pipelines
    // (if $id) Gets a Pipeline
    public function getPipelines($id = false)
    {
        if(!$id){
            return $this->request->get('v2.2/Pipelines');
        }
        return $this->request->get('v2.2/Pipelines/'.$id);
    }


    // (if !$id) Gets a list of Pipeline Stages
    // (if $id) Gets a Pipeline Stage
    public function getPipelineStages($id = false)
    {
        if(!$id){
            return $this->request->get('v2.2/PipelineStages');
        }
        return $this->request->get('v2.2/PipelineStages/'.$id);
    }


    // (if !$id) Gets a list of Pipeline Categories
    // (if $id) Gets a Pipeline Categories
    public function getPipelineCategories($id = false)
    {
        if(!$id){
            return $this->request->get('v2.2/PipelineCategories');
        }
        return $this->request->get('v2.2/PipelineCategories/'.$id);
    }


    // Create pipeline category NOTE: Must be sysadmin
    public function createPipelineCategory(array $data = [])
    {
        return $this->request->post('v2.2/PipelineCategories',$data);
    }


    // Update pipeline category NOTE: Must be sysadmin
    public function updatePipelineCategory(array $data = [])
    {
        return $this->request->put('v2.2/PipelineCategories',$data);
    }


    // Delete pipeline category NOTE: Must be sysadmin
    public function deletePipelineCategory($id = false)
    {
        if(!$id){
            return false;
        }
        return $this->request->delete('v2.2/PipelineCategories/'.$id);
    }



    /***********************       PROJECTS          *************************/
    // Gets a list of project categories
    public function getProjectCategories(array $filter = [])
    {
        $str = $this->urlVars($filter);
        return $this->request->get('v2.2/ProjectCategories'.$str);
    }


    // Gets a project category
    public function getProjectCategory($id = false)
    {
        if(!$id){
            return false;
        }
        return $this->request->get('v2.2/ProjectCategories/'.$id);
    }


    // Create a project category
    public function createProjectCategory(array $data = [])
    {
        return $this->request->post('v2.2/ProjectCategories',$data);
    }


    // Update a project category
    public function updateProjectCategory(array $data = [])
    {
        return $this->request->put('v2.2/ProjectCategories',$data);
    }


    // Delete a project category
    public function deleteProjectCategory($id = false)
    {
        if(!$id){
            return false;
        }
        return $this->request->delete('v2.2/ProjectCategories/'.$id);
    }


    // Gets a list of projects
    public function getProjects(array $filter = [])
    {
        $str = $this->urlVars($filter);
        return $this->request->get('v2.2/Projects'.$str);
    }


    // Gets a project
    public function getProject($id = false)
    {
        if(!$id){
            return false;
        }
        return $this->request->get('v2.2/Projects/'.$id);
    }


    // Creates a project
    public function createProject(array $data = [])
    {
        return $this->request->post('v2.2/Projects', $data);
    }


    // Updates a project
    public function updateProject(array $data = [])
    {
        return $this->request->put('v2.2/Projects', $data);
    }


    // Deletes a project
    public function deleteProject($id = false)
    {
        if(!$id){
            return false;
        }
        return $this->request->delete('v2.2/Projects/'.$id);
    }


    // Gets a projects' emails
    public function getProjectEmails($id = false)
    {
        if(!$id){
            return false;
        }
        return $this->request->get('v2.2/Projects/'.$id.'/Emails');
    }


    // Gets a projects' notes
    public function getProjectNotes($id = false)
    {
        if(!$id){
            return false;
        }
        return $this->request->get('v2.2/Projects/'.$id.'/Notes');
    }


    // Gets a projects' tasks
    public function getProjectTasks($id = false)
    {
        if(!$id){
            return false;
        }
        return $this->request->get('v2.2/Projects/'.$id.'/Tasks');
    }


    // Gets a projects' image
    public function getProjectImage($id = false)
    {
        if(!$id){
            return false;
        }
        return $this->request->get('v2.2/Projects/'.$id.'/Image');
    }



    /***********************       RELATIONSHIPS          *************************/
    // Gets a list of relationships
    public function getRelationships()
    {
        return $this->request->get('v2.2/Relationships');
    }



    /***********************       TAGS          *************************/
    // Gets a list of tags
    // NOTE: $id = object type to find tags for. NOT integer
    public function getTags($id = false)
    {
        if(!$id){
            return $this->request->get('v2.2/Relationships');
        }
        return $this->request->get('v2.2/Relationships/'.$id);
    }



    /***********************       USERS          *************************/
    // (if !$id) Gets a list of Users
    // (if $id) Gets a Users
    public function getUsers($id = false)
    {
        if(!$id){
            return $this->request->get('v2.2/Users');
        }
        return $this->request->get('v2.2/Users/'.$id);
    }


    // Get's logged user allocated to API key
    public function getMe()
    {
        return $this->request->get('v2.2/Users/Me');
    }





    /***********************        MISC          *************************/
    // Gets a list of Countries used by Insightly
    public function getCountries()
    {
        return $this->request->get('v2.2/Countries');
    }


    // Gets a list of Currencies used by Insightly
    public function getCurrencies()
    {
        return $this->request->get('v2.2/Currencies');
    }





    /*********************** Helper Methods ********************************/
    private function urlVars(array $data = [])
    {
        $str = null;
        if(count($data)){
            $str .= "?";
        }
        foreach($data as $k => $v){
            $str .= $k."=".$v."&";
        }

        return $str;
    }
}

<?php namespace Larabook\Statuses;

class LeaveCommentOnStatusCommand {

    /**
     * @var integer
     */
    public $user_id;

    /**
     * @var integer
     */
    public $status_id;

    /**
     * @var string
     */
    public $body;

    /**
     * @param integer user_id
     * @param integer status_id
     * @param string body
     */
    public function __construct($user_id, $status_id, $body)
    {
        $this->user_id = $user_id;
        $this->status_id = $status_id;
        $this->body = $body;
    }

}
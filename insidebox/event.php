<?php
class Event
{
  public $name, $rawDueDate, $rawAssignDate, $assignTime, $dueTime, $type;

  function Event($pName, $pType, $pRawAssignDate, $pRawDueDate, $pId)
  {
    $this->name = $pName;
    $this->type = $pType;
    $this->rawAssignDate = $pRawAssignDate;
    $this->rawDueDate = $pRawDueDate;
    $this->id = $pId;
  }

  function refineDueDate()
  {
    $dueTime = strtotime($this->rawDueDate);
    return $dueTime;
  }

  function refineAssignDate()
  {
    $assignTime = strtotime($this->rawAssignDate);
    return $assignTime;
  }

  function compareDates(Event $pEvent)
  {
    global $timeA;
    global $timeB;

    if ($this->type == 'A')
    {
      $timeA = $this->refineDueDate() - time(); 
      if ($pEvent->type == 'A') 
      {
        $timeB = $pEvent->refineDueDate() - time();
      }
      else if ($pEvent->type == 'N')	
      {
        $timeB = time() - $pEvent->refineAssignDate(); 
      }
    }
    else if ($this->type == 'N')
    {
      $timeA = time() - $this->refineAssignDate();
      if ($pEvent->type == 'A') // Notif A and Assign B
      {
        $timeB = $pEvent->refineDueDate() - time();
      }
      else if ($pEvent->type == 'N') // Notif A and Notif B
      {
        $timeB = time() - $pEvent->refineAssignDate();
      }
    }

    if ($timeA < $timeB) // Returns the Event that has the smaller time
    {
      return true;
    }
    else
    {
      return false;
    }	
  }	
  
  function display()
  {
    echo "Name: " . $this->name . "<br>";
  }
}
?>
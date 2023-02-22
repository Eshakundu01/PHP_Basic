<?php
/**
 * Validating the marks and separates into two array
 * 
 */ 
class Marks {
  public  $marks;

  /**
   * 
   * Constructor
   *
   * @param string $marks
   * 
   */
  public function __construct($marks) {
    $this->marks  =  $marks;
  }

  /**
   * 
   * Check the pattern of the inputed marks if incorrect returns a message
   *
   * @return string
   */
  public function checkPattern(): string  {
    $lines  =  explode("\n",$this->marks);
    foreach ($lines as $line) {
      $input  =   trim($line);
      if  (!preg_match("/[A-Z][a-z]+\|[0-9]+$/",$input))  {
        return "Only subject|score format is allowed in individual line with capital letter in first";
      }
    }
    return "";
  }

  /**
   * 
   * Storing the subjects name in an array
   *
   * @return array
   */
  public function subjectArray(): array  {
    $lines  =  explode("\n",$this->marks);
    foreach ($lines as $line)  {
      $pos = strpos($line,"|");
      $subject = substr($line, 0, $pos);
      $course[] = $subject;
    }
    return $course;
  }

  /**
   * 
   * Storing the marks in integer format in an array
   *
   * @return array
   */
  public function marksArray(): array  {
    $lines  =  explode("\n",$this->marks);
    foreach ($lines as $line)  {
      $pos = strpos($line,"|");
      $score = substr($line, $pos+1);
      $score_int = (int)$score;
      $grade[]  = $score_int;
    }
    return $grade;
  }
}

?>
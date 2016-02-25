<?php
/**
 * Created by PhpStorm.
 * User: Liu
 * Date: 9/21/2015
 * Time: 7:32 PM
 */

class Offering {
    private $cid;
    private $classNum;
    private $instNameL;
    private $instNameF;
    private $timeStart;
    private $timeEnd;
    private $Mon;
    private $Tue;
    private $Thu;
    private $Wed;

    /**
     * @return mixed
     */

    private $Fri;
    private $Sat;
    private $Sun;
    private $startDate;
    private $endDate;
    private $enrlStart;
    private $capEnrl;
    private $totEnrl;
    private $classLocation;
    private $waitCap;
    private $waitTot;
    private $component;
    private $courseTitle;

    /**
     * @param mixed $Wed
     */
    public function setWed($Wed)
    {
        $this->Wed = $Wed;
    }

    public function getWed()
    {
        return $this->Wed;
    }
    /**
     * @return mixed
     */
    public function getCid()
    {
        return $this->cid;
    }

    /**
     * @param mixed $cid
     */
    public function setCid($cid)
    {
        $this->cid = $cid;
    }

    /**
     * @return mixed
     */
    public function getClassNum()
    {
        return $this->classNum;
    }

    /**
     * @param mixed $classNum
     */
    public function setClassNum($classNum)
    {
        $this->classNum = $classNum;
    }

    /**
     * @return mixed
     */
    public function getInstNameL()
    {
        return $this->instNameL;
    }

    /**
     * @param mixed $instNameL
     */
    public function setInstNameL($instNameL)
    {
        $this->instNameL = $instNameL;
    }

    /**
     * @return mixed
     */
    public function getInstNameF()
    {
        return $this->instNameF;
    }

    /**
     * @param mixed $instNameF
     */
    public function setInstNameF($instNameF)
    {
        $this->instNameF = $instNameF;
    }

    /**
     * @return mixed
     */
    public function getTimeStart()
    {
        return $this->timeStart;
    }

    /**
     * @param mixed $timeStart
     */
    public function setTimeStart($timeStart)
    {
        $this->timeStart = $timeStart;
    }

    /**
     * @return mixed
     */
    public function getTimeEnd()
    {
        return $this->timeEnd;
    }

    /**
     * @param mixed $timeEnd
     */
    public function setTimeEnd($timeEnd)
    {
        $this->timeEnd = $timeEnd;
    }

    /**
     * @return mixed
     */
    public function getMon()
    {
        return $this->Mon;
    }

    /**
     * @param mixed $Mon
     */
    public function setMon($Mon)
    {
        $this->Mon = $Mon;
    }

    /**
     * @return mixed
     */
    public function getTue()
    {
        return $this->Tue;
    }

    /**
     * @param mixed $Tue
     */
    public function setTue($Tue)
    {
        $this->Tue = $Tue;
    }

    /**
     * @return mixed
     */
    public function getThu()
    {
        return $this->Thu;
    }

    /**
     * @param mixed $Thu
     */
    public function setThu($Thu)
    {
        $this->Thu = $Thu;
    }

    /**
     * @return mixed
     */
    public function getFri()
    {
        return $this->Fri;
    }

    /**
     * @param mixed $Fri
     */
    public function setFri($Fri)
    {
        $this->Fri = $Fri;
    }

    /**
     * @return mixed
     */
    public function getSat()
    {
        return $this->Sat;
    }

    /**
     * @param mixed $Sat
     */
    public function setSat($Sat)
    {
        $this->Sat = $Sat;
    }

    /**
     * @return mixed
     */
    public function getSun()
    {
        return $this->Sun;
    }

    /**
     * @param mixed $Sun
     */
    public function setSun($Sun)
    {
        $this->Sun = $Sun;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param mixed $startDate
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param mixed $endDate
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }

    /**
     * @return mixed
     */
    public function getEnrlStart()
    {
        return $this->enrlStart;
    }

    /**
     * @param mixed $enrlStart
     */
    public function setEnrlStart($enrlStart)
    {
        $this->enrlStart = $enrlStart;
    }

    /**
     * @return mixed
     */
    public function getCapEnrl()
    {
        return $this->capEnrl;
    }

    /**
     * @param mixed $capEnrl
     */
    public function setCapEnrl($capEnrl)
    {
        $this->capEnrl = $capEnrl;
    }

    /**
     * @return mixed
     */
    public function getTotEnrl()
    {
        return $this->totEnrl;
    }

    /**
     * @param mixed $totEnrl
     */
    public function setTotEnrl($totEnrl)
    {
        $this->totEnrl = $totEnrl;
    }

    /**
     * @return mixed
     */
    public function getClassLocation()
    {
        return $this->classLocation;
    }

    /**
     * @param mixed $classLocation
     */
    public function setClassLocation($classLocation)
    {
        $this->classLocation = $classLocation;
    }

    /**
     * @return mixed
     */
    public function getWaitCap()
    {
        return $this->waitCap;
    }

    /**
     * @param mixed $waitCap
     */
    public function setWaitCap($waitCap)
    {
        $this->waitCap = $waitCap;
    }

    /**
     * @return mixed
     */
    public function getWaitTot()
    {
        return $this->waitTot;
    }

    /**
     * @param mixed $waitTot
     */
    public function setWaitTot($waitTot)
    {
        $this->waitTot = $waitTot;
    }

    /**
     * @return mixed
     */
    public function getComponent()
    {
        return $this->component;
    }

    /**
     * @param mixed $component
     */
    public function setComponent($component)
    {
        $this->component = $component;
    }

    /**
     * @return mixed
     */
    public function getCourseTitle()
    {
        return $this->courseTitle;
    }

    /**
     * @param mixed $courseTitle
     */
    public function setCourseTitle($courseTitle)
    {
        $this->courseTitle = $courseTitle;
    }

}
?>
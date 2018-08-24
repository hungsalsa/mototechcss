<?php
/**
 * Created by PhpStorm.
 * User: Haivu
 * Date: 4/4/14
 * Time: 4:33 PM
 */

class UserOnline extends AppModel{

    var $timeSetToOffLine = 300; //5' * 60s

    /*
     * init model
     */
    public function init($onlineSessionId = null) {
        if( empty($onlineSessionId)) return ;

        $userOnline = $this->findByIpClient($onlineSessionId);
        $time_out = time() + $this->timeSetToOffLine ;

        if(empty($userOnline) || $userOnline == false) {
            $userOnline['UserOnline']['ip_client'] = $onlineSessionId;
            $userOnline['UserOnline']['time_in'] = date('Y-m-d H:i:s',time());
            $userOnline['UserOnline']['time_out'] = $time_out;
            $this->save($userOnline, false, false);
        }
        else {
            $this->id = $userOnline['UserOnline']['id'];
            $this->saveField('time_out', $time_out);
        }
        $this->deleteAll(array('UserOnline.time_out <=' => time()) , false  , false);
    }

    /**
     * count users online now
     * @return mixed
     */
    public function countOnline() {
        $online = $this->find('count');
        return $online;
    }

    /**
     * total user visit
     * @return mixed
     */
    public function totalVisit() {
        $total = $this->find('first', array(
            'order' => array(
                'UserOnline.id DESC'
            ),
            'fields' => array(
                'id'
            )
        ));
        return $total['UserOnline']['id'];
    }
} 
<?php

/**
 * Description of Service
 *
 * @author Kelvin Pereira Alves <kelvinpalves@gmail.com>
 */
class Service{
    protected $em;
    protected $log;
    
    public function __construct() {
       $this->em = Connect::getEm();
       $this->log = Log::getLog(__CLASS__);
    }
    
    public function delete($model) {
        try{
            $this->em->getConnection()->beginTransaction();
            
            $this->em->remove($model);
            $this->em->flush();
            
            $this->em->getConnection()->commit();
            return true;
        } catch (Exception $ex) {
            print $ex->getMessage();
            $this->em->getConnection()->rollBack();
            return false;
        }
    }

    public function findAll($nameModel) {
        try{
            $repository = $this->em->getRepository($nameModel);
            $models = $repository->findAll();
            return $models;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return  null;
        }
    }

    public function findById($nameModel, $id) {
        try{
            
            $this->log->info($nameModel . " --- " . $id);
            
            $model = $this->em->find($nameModel, $id);
            $this->log->info('kelvin2');
            return $model;
        } catch (Exception $ex) {
            $this->log->error($ex->getMessage());
            return null;
        }
    }

    public function insert($model) {
        try{
            $this->em->getConnection()->beginTransaction();
            
            $this->em->persist($model);
            $this->em->flush();
            $this->em->getConnection()->commit();
            return true;
        } catch (Exception $ex) {
            $this->log->error($ex->getMessage());
            $this->em->getConnection()->rollBack();
            return false;
        }
    }

    public function update($model) {
        try{
            $this->em->getConnection()->beginTransaction();
            $this->em->merge($model);
            $this->em->flush();
            $this->em->getConnection()->commit();
            return true;
        } catch (Exception $ex) {
            $this->em->getConnection()->rollBack();
            print $ex->getMessage();
            return false;
        }
    }

}
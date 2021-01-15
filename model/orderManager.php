<?php

class OrderManager extends Manager{

    public function getOrdersByUserId($clientId) {
        $stmt = $this->_pdo->prepare(
            "SELECT * FROM `order` 
            WHERE id_client = :id_client"
        );

        $stmt->bindValue(':id_client', $clientId);
    
        try {
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            $this->_pdo->rollBack();
            throw $e;
        }
    }
}
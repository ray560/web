<?php
class database{
    //database
    private $conn;
    //constructor
    public function __construct($db) {
        $this->conn = $db;
    }
    

    public function check_if_seat_is_taken($seat_no){
         //database query
         $query =  'SELECT
          sum(case when seat_no = ? then 1 else 0 end)  
          as s  
          FROM   
          ticket 
          where 
          trip_id=5668';
            
           //Prepared statement
        $stmt = $this->conn->prepare($query);
        //execute query
        $stmt->bindParam(1, $seat_no);
        
        try{
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            extract($row);
            $c = $row['s'];
            echo $s;
            
         }catch(PDOException $e){
             //return error if something goes wrong
             printf("Error: %s" , $e->getMessage());
         }
    }

    public function getSeats($tripId){
          //database query
          $query =  'SELECT
            seat_no
          FROM ticket 
        WHERE 
            trip_id = ?
          ';
         //Prepared statement
      $stmt = $this->conn->prepare($query);
      //execute query
      $stmt->bindParam(1, $tripId);
      
      try{
          $stmt->execute();
          $trips =[];
          while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
              extract($row);
              array_push($trips, array(
                  'seat_no'=>$row['seat_no']
              ));
          }
        //   '[{"students": "teachher"}]
          echo json_encode($trips);
          
       }catch(PDOException $e){
           //return error if something goes wrong
           printf("Error: %s" , $e->getMessage());
       }
    }
    
    public function getrouteId($to_destination, $from_destination){
        //database query
        $query =  'SELECT
        case when to_destination=:to_destination and from_destination = :from_destination then id end
        FROM routes 
        ';
        //Prepared statement
        $stmt = $this->conn->prepare($query);
        
        $to_destination = htmlspecialchars(strip_tags($to_destination));
        $from_destination = htmlspecialchars(strip_tags($from_destination));

        $stmt->bindParam('to_destination', $to_destination);
        $stmt->bindParam('from_destination', $from_destination);
           
        try{
            $stmt->execute();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);
                $routeid=$row['seat_no'];
                if($routeid!=NULL){
                    return $routeid;
                }
             }
        }catch(PDOException $e){
        //return error if something goes wrong
        printf("Error: %s" , $e->getMessage());
        }
    }

    public function createTrip($trip){
        $data = json_decode($trip);

        $id = $data->id;
        $depature_date= $data->depature_date;
        $no_of_passengers = $data->no_of_passengers;
        $routes_id = $data->routeid;
        $driver_driver_id = $ $data->driver_id;
        $bus_bus_id = $data->bus_id;
        
        //database query
        $query =  'INSERT
        INTO trip
        SET
            id = :id
            depature_date = :depature_date,
            no_of_passengers = :no_of_passengers,
            routes_id = :routes_id,
            driver_driver_id = :driver_driver_id,
            bus_bus_id = :bus_bus_id
        ';
        //Prepared statement
        $stmt = $this->conn->prepare($query);
        
        $id = htmlspecialchars(strip_tags($id));
        $depature_date = htmlspecialchars(strip_tags($depature_date));
        $no_of_passengers = htmlspecialchars(strip_tags($no_of_passengers));
        $routes_id = htmlspecialchars(strip_tags($routes_id));
        $driver_driver_id = htmlspecialchars(strip_tags($driver_driver_id));
        $bus_bus_id = htmlspecialchars(strip_tags($bus_bus_id));

        $stmt->bindParam('id', $id);
        $stmt->bindParam('depature_date', $depature_date);
        $stmt->bindParam('no_of_passengers', $no_of_passengers);
        $stmt->bindParam('routes_id', $routes_id);
        $stmt->bindParam('driver_driver_id', $driver_driver_id);
        $stmt->bindParam('bus_bus_id', $bus_bus_id);

  
        try{
            $stmt->execute();
            return true;
        }catch(PDOException $e){
        //return error if something goes wrong
        printf("Error: %s" , $e->getMessage());
        return false;
        }
    }
    public function createTicket($trip){
        

        $firstname = $trip->firstname;
        $lastname = $trip->lastname;
        $trip_id = $trip->trip_id;
        $phonenumber = $trip->phonenumber;
        $seat_no =  $trip->seat_no;
        $transaction_id =  $trip->transaction_id;

        //database query
        $query =  'INSERT
        INTO ticket
        SET
            firstname = :firstname,
            trip_id = :trip_id,
            phonenumber = :phonenumber,
            seat_no = :seat_no,
            transaction_id=transaction_id,
            lastname = :lastname
        ';
        //Prepared statement
        $stmt = $this->conn->prepare($query);
        
        $firstname = htmlspecialchars(strip_tags($firstname));
        $trip_id = htmlspecialchars(strip_tags($trip_id));
        $phonenumber = htmlspecialchars(strip_tags($phonenumber));
        $seat_no = htmlspecialchars(strip_tags($seat_no));
        $lastname = htmlspecialchars(strip_tags($lastname));
        $transaction_id = htmlspecialchars(strip_tags($transaction_id));

        $stmt->bindParam('firstname', $firstname);
        $stmt->bindParam('trip_id', $trip_id);
        $stmt->bindParam('phonenumber', $phonenumber);
        $stmt->bindParam('seat_no', $seat_no);
        $stmt->bindParam('lastname', $lastname);
        $stmt->bindParam('transaction_id', $transaction_id);

  
        try{
            $stmt->execute();
            echo("ticket created");
            
            return true;

        }catch(PDOException $e){
        //return error if something goes wrong
        printf("Error: %s" , $e->getMessage());
        return false;
        }
    }
   
    public function createRoutes($to_destination, $from_destination, $price){
      
        //database query
        $query =  'INSERT
        INTO routes
        SET
            to_destination = :to_destination,
            from_destination = :from_destination,
            price = :price
        ';
        //Prepared statement
        $stmt = $this->conn->prepare($query);
        
        $to_destination = htmlspecialchars(strip_tags($to_destination));
        $from_destination = htmlspecialchars(strip_tags($from_destination));
        $price = htmlspecialchars(strip_tags($price));

        $stmt->bindParam('to_destination', $to_destination);
        $stmt->bindParam('from_destination', $from_destination);
        $stmt->bindParam('price', $price);

  
        try{
            $stmt->execute();
            return true;
        }catch(PDOException $e){
        //return error if something goes wrong
        printf("Error: %s" , $e->getMessage());
        return false;
        }
    }

    public function getRoutes(){
        //database query
        $query =  'SELECT 
            id,
            to_destination,
            from_destination,
            price
        FROM
            routes
        ';
        //Prepared statement
        $stmt = $this->conn->prepare($query);
        try{
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;
           
        }catch(PDOException $e){
        //return error if something goes wrong
        printf("Error: %s" , $e->getMessage());
       
        }
    }

    public function getTickets(){
        //database query
        $query =  'SELECT 
            id,
            CONCAT(firstname, " ", lastname) AS name,
            phonenumber,
            transaction_id,
            seat_no,
            trip_id
        FROM
            ticket
        ';
        //Prepared statement
        $stmt = $this->conn->prepare($query);
        try{
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;
           
        }catch(PDOException $e){
        //return error if something goes wrong
        printf("Error: %s" , $e->getMessage());
       
        }
    }

}
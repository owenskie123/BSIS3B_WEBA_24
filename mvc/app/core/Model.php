<?php

class Model extends Database
{
    public function __construct()
    {
        if (!property_exists($this, 'table'))
        {
            $this->table = strtolower($this::class) . 's';
        }
    }


    public function findAll()
    {
        $query = "select * from $this->table";
        $result = $this->query($query);
        if ($result)
        {
            return $result;
        }
        return false;
    }



    public function where($data, $data_not = [])
    {
        
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        $query = "select * from $this->table";


        foreach ($keys as $key)
        {
            $query .= $key . " = :" . $key . " && ";
        }

        foreach ($keys_not as $key)
        {
            $query .= $key . " != :" . $key . " && ";
        }

        $query = trim($query, " && ");
        show ($query);

        $data =  array_merge($data, $data_not);
        $result = $this->query($query, $data);

        
        $result = $this->query($query, $data);
        if ($result)
        {
            return $result;
        }

    }



    public function insert($data)
    {
        // insert into users (firstname, lastname, email, password) values (:firstname, )
        $columns = implode (', ', array_keys($data));
        $values = implode (', :', array_keys($data));
        $query = "insert into $this->table ($columns) values
        (:$values)";
        show($query);
        $this->query($query, $data);

        return false;
    }



    public function update($id, $data, $column = 'id')
    {
        // update users set firstname = :firstname
        $keys = array_keys($data);
        $query = "update $this->table set ";

        foreach($keys as $key)
        {
            $query .= $key . " = :" . $key . ", ";
        }

        $query = trim($query, ", ");
        $query = " where $column = :$column";

        $data[$column] = $id;
        $this->query($query, $data);

        return false;
    }



    public function delete($id, $column = 'id')
    {
        $data[$column] = $id;
        $query = "delete from $this->table where $column =
        :$column";

        $this->query($query, $data);
        return false;
    }

}
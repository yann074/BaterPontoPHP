<?php

class User extends Model {
    protected static $tableName = 'users';
    protected static $columns = [
        'id',
        'nome',
        'password',
        'email',
        'start_date',
        'end_date',
        'is_admin',
    ];


    
}
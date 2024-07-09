<?php
interface Idao{
    public function save($objet):bool;
    public function update($objet):bool;
    public function search($id);
    public function delete($id):bool;
    public function displayAll():array;
}
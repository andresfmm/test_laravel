<?php
namespace App\Repositories;

use App\Company;

class CompanyRepository{

public function save($request){
	Company::create($request->all());
    }

public function getAll(){
	return Company::all();
    } 

public function remove($company){
	$company->delete();
    }  

public function update($request, $company){
	$company->update($request->all());
    }       


}
import { Injectable } from '@angular/core';

@Injectable()
export class UserService {
  
  constructor() { }

  public getName(){
    return localStorage.getItem('loggedinUser');
  }

  public getEmail(){
    return localStorage.getItem('email');
  }

  public setName(username){
    localStorage.setItem('loggedinUser',username);
  }

  public setEmail(email){
    localStorage.setItem('email',email);
  }

  public setUserId(id){
    localStorage.setItem('id',id);
  }

  public getUserId(){
     return localStorage.getItem('id');
  }

  public isLoggedIn(){
    return localStorage.getItem('loggedIn');
  }

  public setLoggedIn(status){
    localStorage.setItem('loggedIn',status);
  }

  public signOut(){
    localStorage.setItem('email',"");
    localStorage.setItem('loggedinUser',"");
    localStorage.setItem('id',"");
  }
}

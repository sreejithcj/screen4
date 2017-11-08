import { Component, OnInit } from '@angular/core';
import{ UserService } from '../../services/user.service';
import { Router } from '@angular/router';
import {Location, LocationStrategy, PathLocationStrategy} from '@angular/common';

@Component({
  selector: 'app-header',
  providers: [Location, {provide: LocationStrategy, useClass: PathLocationStrategy}],
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.css']
})
export class HeaderComponent implements OnInit {
  name: string;
  email: string;
  loggedIn: string;
  location: Location;
  searchObj: Object = {};

  constructor(private userService:UserService, private router: Router, location: Location,) { 
    this.location = location;
  }

  getUserEmail(){
    return this.userService.getEmail();
  }

  getUserName(){
    return this.userService.getName();
  }

  ngOnInit() {}

  signout(){
    this.userService.signOut();
    this.location.path(); 
  }  

  search(){
    console.log('In Search');
    let str = this.searchObj["str"];
    console.log(str);
  }
}

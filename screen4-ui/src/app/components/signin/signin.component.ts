import { Component, OnInit } from '@angular/core';
import { AuthService } from "angular4-social-login";
import { FacebookLoginProvider, GoogleLoginProvider } from "angular4-social-login";
import { SocialUser } from "angular4-social-login";
import sha256 from 'crypto-js/sha256';
import{ DataService } from '../../services/data.service';
import{ UserService } from '../../services/user.service';
import { Router } from "@angular/router";
import {Location, LocationStrategy, PathLocationStrategy} from '@angular/common';


@Component({
  selector: 'app-signin',
  providers: [Location, {provide: LocationStrategy, useClass: PathLocationStrategy}],
  templateUrl: './signin.component.html',
  styleUrls: ['./signin.component.css']
})
export class SigninComponent implements OnInit {
  location: Location;
  private user: SocialUser;
  private loggedIn: boolean;
  returnUrl: string;

  userObj: Object = {};
  signinStatus: string;

  constructor(location: Location, private authService: AuthService, private dataService:DataService, private userService:UserService, private router: Router) { 
    this.location = location;
  }

  ngOnInit() {

    this.authService.authState.subscribe((user) => {
      this.user = user;
      this.loggedIn = (user != null);
    });
  }

  signInWithGoogle(): void {
    this.authService.signIn(GoogleLoginProvider.PROVIDER_ID);
  }
 
  signInWithFB(): void {
    this.authService.signIn(FacebookLoginProvider.PROVIDER_ID);
  }
 
  signOut(): void {
    this.authService.signOut();
  }
  
  signin(){
    let pwdCrypt = sha256(this.userObj["password"]);
    this.dataService.signin(this.userObj["email"],pwdCrypt).subscribe((result) => {
      if(result == 'FAILURE'){
          this.signinStatus = 'Signin failed. Please try again';
      }
      else
      {
          this.signinStatus = '';
          this.userService.setName(result[0].name);
          this.userService.setEmail(result[0].email);
          this.userService.setUserId(result[0].id);
          this.location.back();  
      }
    });
  }
}

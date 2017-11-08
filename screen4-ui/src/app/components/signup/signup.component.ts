import { Component, OnInit } from '@angular/core';
import { CustomValidators } from 'ng2-validation';
import hmacSHA512 from 'crypto-js/hmac-sha512';
import sha256 from 'crypto-js/sha256';
import{ DataService } from '../../services/data.service';
import { Router } from "@angular/router";

@Component({
  selector: 'app-signup',
  templateUrl: './signup.component.html',
  styleUrls: ['./signup.component.css']
})
export class SignupComponent implements OnInit {

user: Object = {};
signupStatus: string;

  constructor(private dataService:DataService, private router: Router) { }

  ngOnInit() {
  }

  signup(){
    let pwdCrypt = sha256(this.user["password"]);
    console.log(this.user);
    console.log('Crypt' + pwdCrypt);

    this.dataService.signup(this.user["name"],this.user["email"],pwdCrypt).subscribe((result) => {
      if(result == 'TAKEN'){
        this.signupStatus = 'Email id is alreay taken';
      }
      else
      {
        this.signupStatus = 'Registration successful';
        this.router.navigate(['/signin']);
      }
    });
  }
}
import { Component, OnInit } from '@angular/core';
import { IHobbyModule } from '../../modules/ihobby/ihobby.module';
import{ DataService } from '../../services/data.service';


@Component({
  selector: 'app-user',
  templateUrl: './user.component.html',
  styleUrls: ['./user.component.css']
})
export class UserComponent implements OnInit {
  name:string;
  phone:string;
  email:string;
  occupation:any;
  hobbies:IHobbyModule;
  posts:Post[];

  constructor(private dataService:DataService) { }

  ngOnInit() {
    this.name = "Sreejith C J";
    this.phone = '9886194256';
    this.occupation = 'Entrepreneur';
    this.hobbies = {
      hobby:"Movies",
      interests:"Travel",
      sports:"Football"
    }

    /*this.dataService.getPosts().subscribe((posts) => {
      this.posts = posts;
    });*/

    console.log('Hello');
  }
  onClick(){
    this.name = 'Sree';
  }

  addUser(nam){
    this.name=nam;
    return false;
  }

}

interface Post{
    id: number;
    title:string,
    body:string,
    userId:number
  }
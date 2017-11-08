import { Component, OnInit } from '@angular/core';
import{ DataService } from '../../services/data.service';
import {Router, ActivatedRoute, Params} from '@angular/router';
import{ UserService } from '../../services/user.service';


@Component({
  selector: 'app-play',
  templateUrl: './play.component.html',
  styleUrls: ['./play.component.css']
})
export class PlayComponent implements OnInit {

  title:string;
  brief:string;
  largeImage:string;
  duration:string;
  genre:string;
  year:string;  
  url: string;
  video: Object = {};
  videoId: number;
  postStatus: string;
  comments: Comment[]; 

  constructor(private dataService:DataService,private activatedRoute: ActivatedRoute, private userService:UserService) { 
   
  }

  ngOnInit() {
     // this.videoSource = "https://youtu.be/7K28a10Qs6A";
      this.activatedRoute.queryParams.subscribe((params: Params) => {
        this.videoId = params['id'];
  
        this.dataService.getVideoAttributes(this.videoId).subscribe((video) => {
          this.title = video[0].title;
          this.brief = video[0].brief;
          this.largeImage = video[0].largeImage;
          this.duration = video[0].duration;
          this.genre = video[0].genre;
          this.year = video[0].year;
          this.url = video[0].url;
      });        
  });

  this.populateComments();    
  }
  getUserName(){
      return this.userService.getName();
    }

  populateComments(){
    this.dataService.getCommentsFor(this.videoId).subscribe((comments) => {
      this.comments = comments; 
    });
  }

  onComment(){
    this.dataService.addComment(this.videoId,this.userService.getUserId(),this.video['comment']).subscribe((result) => {
        if(result == 'FAILURE'){
          this.postStatus = 'Failed. Please try again';
        }
        this.populateComments();
    });    
  }
}

interface Comment{
    comment:  string,
    name: string
}
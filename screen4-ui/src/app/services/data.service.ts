import { Injectable } from '@angular/core';
import { Http } from '@angular/http';
import 'rxjs/add/operator/map';

@Injectable()
export class DataService {

base: string;
token: string;

constructor(public http:Http) { 
  this.base = "http://localhost/screen4/public/api/";
  this.token = "?api_token=1X590qIgLsCmBJ8mHkYOaRmPPfqTZ0Ererj29ncRhbRaXhMMffXua4yIgLYx";
}

getHomePageSliderImages(){
  return this.http.get(this.base + 'sliders' + this.token) 
    .map(res => res.json());
}

getPromotedVideosForHomePage(){
  return this.http.get(this.base + 'home_videos' + this.token) 
    .map(res => res.json());
}

getVideosForACategory(id=0,limit=0,url=null){
  if(url==null)
    url = this.base + 'category_videos/' + id + '/' + limit + this.token;
  return this.http.get(url) 
    .map(res => res.json());      
}
  
getCategoryTitle(categoryId){
    return this.http.get(this.base + 'category_title/' + categoryId +this.token) 
      .map(res => res.json());
  }

getVideoAttributes(videoId){
    return this.http.get(this.base + 'video_attributes/' +  videoId + this.token) 
      .map(res => res.json());
}
   
signup(name,email,password){
  return this.http.get(this.base + 'signup/' + name + '/' + email + '/' + password + this.token) 
    .map(res => res.json());
}

signin(email,password){
  return this.http.get(this.base + 'signin/' + email + '/' + password + this.token) 
    .map(res => res.json());
}

addComment(videoId,userId,comment){
  return this.http.get(this.base + 'add_comment/'+ videoId + '/' + userId + '/' + comment + this.token) 
    .map(res => res.json());

}
getCommentsFor(videoId){
    let url = this.base + "get_comments/" + videoId + this.token;
    return this.http.get(url) 
      .map(res => res.json());
  }
}
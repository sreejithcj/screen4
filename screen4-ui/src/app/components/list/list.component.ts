import { Component, OnInit } from '@angular/core';
import{ DataService } from '../../services/data.service';
import {Router, ActivatedRoute, Params} from '@angular/router';

@Component({
  selector: 'app-list',
  templateUrl: './list.component.html',
  styleUrls: ['./list.component.css'],
})

export class ListComponent implements OnInit {
    videos:Video[];
    category:string;
    limit:number;
    nextPage:string;
    
  constructor(private dataService:DataService,private activatedRoute: ActivatedRoute) {
    this.limit = 10;
    this.videos = [];
  }

  ngOnInit() {      
      this.activatedRoute.queryParams.subscribe((params: Params) => {
        this.getVideos(params['id'],this.limit);
        this.category = params['name'];
      });
    }

  loadMoreVideos(event) {
    this.getVideos(0,0,this.nextPage);
  }

  getVideos(id=0,limit=0,url=null){
    this.dataService.getVideosForACategory(id,limit,url).subscribe((videos) => {
      this.videos = this.videos.concat(videos['data']);
      this.nextPage = videos['next_page_url'];
    });
  }
}

interface Video{
    id:   number,
    title: string,
    brief: string,
    image: string
}
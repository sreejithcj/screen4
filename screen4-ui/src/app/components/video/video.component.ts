import { Component, OnInit } from '@angular/core';
import {ActivatedRoute, Params} from '@angular/router';
declare var jwplayer: any;

@Component({
  selector: 'app-video',
  templateUrl: './video.component.html',
  styleUrls: ['./video.component.css']
})

export class VideoComponent implements OnInit {
  player: any;

  constructor(private activatedRoute: ActivatedRoute) { }
    ngOnInit() {
      this.activatedRoute.queryParams.subscribe((params: Params) => {     
      this.player = new jwplayer("container").setup({
        file: params['url'],       
      });
      this.loadVideo(params['url'],params['image']);
    });   
  }

  loadVideo(url,image){
    this.player.load({
      file: url,
      image:image
    });
  }
}
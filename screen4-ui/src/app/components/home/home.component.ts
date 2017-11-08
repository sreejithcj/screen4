import { Component, OnInit } from '@angular/core';
import { DataService } from '../../services/data.service';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})

export class HomeComponent implements OnInit {
  images: any = {};
  categories: any = {};

  constructor(private dataService:DataService) { }

  ngOnInit() {    
      this.dataService.getHomePageSliderImages().subscribe((images) => {
        this.images = images;   
      });

      this.dataService.getPromotedVideosForHomePage().subscribe((categories) => {
        this.categories = categories;
      });
  }
}
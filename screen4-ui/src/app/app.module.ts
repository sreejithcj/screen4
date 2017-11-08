import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { HttpModule } from '@angular/http';
import { RouterModule,Routes,RouterStateSnapshot } from '@angular/router';
import { InfiniteScrollModule } from 'ngx-infinite-scroll';
import { SocialLoginModule, AuthServiceConfig } from "angular4-social-login";
import { GoogleLoginProvider, FacebookLoginProvider } from "angular4-social-login";
import { NgxCarouselModule } from 'ngx-carousel';

let config = new AuthServiceConfig([
  {
    id: GoogleLoginProvider.PROVIDER_ID,
    provider: new GoogleLoginProvider("Google-OAuth-Client-Id")
  },
  {
    id: FacebookLoginProvider.PROVIDER_ID,
    provider: new FacebookLoginProvider("Facebook-App-Id")
  }
]);

export function provideConfig() {
  return config;
}

import { AppComponent } from './app.component';
import { UserComponent } from './components/user/user.component';

import { DataService } from './services/data.service';
import { UserService } from './services/user.service';
import { AboutComponent } from './components/about/about.component';
import { HomeComponent } from './components/home/home.component';
import { ListComponent } from './components/list/list.component';
import { PlayComponent } from './components/play/play.component';
import { SignupComponent } from './components/signup/signup.component';
import { SigninComponent } from './components/signin/signin.component';
import { HeaderComponent } from './components/header/header.component';
import { FooterComponent } from './components/footer/footer.component';
import { CustomFormsModule } from 'ng2-validation';
import { VideoComponent } from './components/video/video.component';

const appRoutes:Routes=[
{path:'',component:HomeComponent},
{path:'about',component:AboutComponent},
{path:'list',component:ListComponent},
{path:'play',component:PlayComponent},
{path:'user',component:UserComponent},
{path:'signin',component:SigninComponent},
{path:'signup',component:SignupComponent},
{path:'video',component:VideoComponent}
];

@NgModule({
  declarations: [
    AppComponent,
    UserComponent,
    AboutComponent,
    HomeComponent,
    ListComponent,
    PlayComponent,
    SignupComponent,
    SigninComponent,
    HeaderComponent,
    FooterComponent,
    VideoComponent,
  ],
  imports: [
    BrowserModule,
    FormsModule,
    HttpModule,
    RouterModule.forRoot(appRoutes),
    InfiniteScrollModule,
    SocialLoginModule,
    CustomFormsModule,
    NgxCarouselModule    
  ],
  providers: [DataService,UserService,
  {provide: AuthServiceConfig, useFactory: provideConfig}
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
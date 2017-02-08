import { NgModule }      from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { FormsModule} from '@angular/forms';
import { HttpModule }    from '@angular/http';

import { AppRoutingModule } from './app-routing.module';

import { AppComponent }  from './app.component';
import { WorklistComponent } from './worklist.component';
import { AddWorkComponent } from './addwork.component';
import { WorkComponent } from './work.component';

import { WorkService } from './work.service';

@NgModule({
  imports:      [ 
  	BrowserModule,
  	AppRoutingModule,
    FormsModule,
    HttpModule
  ],
  declarations: [ 
  	AppComponent, 
  	WorklistComponent,
    AddWorkComponent,
    WorkComponent
  ],
  providers : [
    WorkService
  ],
  bootstrap:    [ 
  	AppComponent
  ]
})

export class AppModule {
  token = "";
}

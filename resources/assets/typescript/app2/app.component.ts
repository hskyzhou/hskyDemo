import { Component, OnInit } from '@angular/core';


@Component({
  moduleId : module.id,
  selector: 'my-app',
  template: `
  	
	<router-outlet></router-outlet>
  `,
  styleUrls : [
    'app.component.css'
  ]
})

export class AppComponent implements OnInit { 
	title = "Tour of Heros";

  ngOnInit() : void{
    
  }
}

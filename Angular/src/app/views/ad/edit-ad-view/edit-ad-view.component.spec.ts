import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { EditAdViewComponent } from './edit-ad-view.component';

describe('EditAdViewComponent', () => {
  let component: EditAdViewComponent;
  let fixture: ComponentFixture<EditAdViewComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ EditAdViewComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(EditAdViewComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

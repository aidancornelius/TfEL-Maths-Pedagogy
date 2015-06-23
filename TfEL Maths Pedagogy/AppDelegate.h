//
//  AppDelegate.h
//  TfEL Maths Pedagogy
//
//  Created by Aidan Cornelius-Bell on 22/05/2015.
//  Copyright (c) 2015 Department for Education and Child Development. All rights reserved.
//

#import <UIKit/UIKit.h>

@interface AppDelegate : UIResponder <UIApplicationDelegate>

@property (strong, nonatomic) UIWindow *window;

// This one stops stuff from going into the UDB repetedly - I should add updates to the database
@property (nonatomic) BOOL nvShouldEnterToUserEntries;

// While building CDC name
@property (strong, nonatomic) NSString *cdcName;

// Inter-view porperty
@property (strong, nonatomic) NSString *nextDomain;

// Gosh this one is nasty lookin' isn't it! (Should I get the data from user entries, or from the standard db)
@property (nonatomic) BOOL nvShouldRetrFromUserEntries;

// Global for 'where the database is'
@property (strong, nonatomic) NSString *databasePath;

@end


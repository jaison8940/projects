/* Replace "dll.h" with the name of your header */
#include "dll.h"
#include <windows.h>
#include <Middle.h>
#include<iostream>
using namespace std;

JNIEXPORT jint JNICALL Java_Middle_importx
  (JNIEnv *, jobject, jstring, jstring){
  	cout<<"pop";
  	return 4;
  }

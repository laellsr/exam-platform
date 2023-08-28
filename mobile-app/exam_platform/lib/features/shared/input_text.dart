import 'package:flutter/material.dart';

class InputText extends StatelessWidget {
  const InputText({super.key, required this.hint});

  final String hint;

  @override
  Widget build(BuildContext context) {
    return Container(
      padding: const EdgeInsets.all(3),
      decoration: BoxDecoration(
        borderRadius: BorderRadius.circular(20),
        color: const Color(0xffE3EDF7),
        boxShadow: const [
          BoxShadow(color: Colors.white, spreadRadius: 0, blurRadius: 2)
        ],
      ),
      child: Container(
        alignment: Alignment.center,
        decoration: BoxDecoration(
            borderRadius: BorderRadius.circular(16),
            color: const Color(0xffE3EDF7),
            boxShadow: [
              BoxShadow(
                color: Colors.grey.withOpacity(0.4),
                spreadRadius: 0,
                blurRadius: 2,
              )
            ]),
        child: TextFormField(
          decoration: InputDecoration(border: InputBorder.none, hintText: hint),
        ),
      ),
    );
  }
}
